<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Illuminate\Support\Carbon;
use App\Models\Session as Akbar;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        #query executing
        $user = Admin::where('email','=',$email)
                    ->where('password','=',$password)
                    ->first();
        if($user)
        {
            #save user info to session
            $email = $user->email;
            $password = $user->password;
            Session::put('email',$email);
            // Session::put('userrole',$role);
            return redirect()->to('/dashboard');
        }
        else
        {
            return redirect()->to('/')->with('err_msg','invalid email or password');
        }
        // dd($request->email);
    }
    public function logout()
    {
        Session::forget(['email']);
        return redirect()->to('/');
    }
    public function index()
    {
        $allsessions= Akbar::all();
        return view('admin.pages.session', compact('allsessions'));
    }
    public function create()
    {
        return view('admin.session.create');
    }
    public function add(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required|unique:sessions|max:50',
        ],
        [
            'name.required' => 'Name must be inserted'
        ]);
        if($request->status == null)
        {
            $request->status = 0;
        }
        Akbar::insert([
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        return redirect()->to('all-sessions')->with('inserted','Session added successfully');
    }
    public function edit($id)
    {
        $allsessions = Akbar::find($id);
        return view('admin.session.edit', compact('allsessions'));
    }
    public function update($id, Request $request)
    {
        $var = Akbar::find($id);
        $var->name = $request->name;

        if($var->save())
        {
            return redirect()->to('all-sessions');
        }
    }
    public function delete($id)
    {
        $var = Akbar::find($id);
        if($var->delete())
        {
            return redirect()->to('all-sessions');
        }
    }
}
