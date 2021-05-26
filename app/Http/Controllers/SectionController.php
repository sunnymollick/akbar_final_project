<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Section as Akbar;
class SectionController extends Controller
{
    public function index()
    {
        $allsections = Akbar::all();
        return view('admin.pages.section', compact('allsections'));
    }
    public function create()
    {
        return view('admin.section.create');
    }
    public function add(Request $request)
    {
        // $validateData = $request->validate([
        //     'batch'=>'required|unique:sections|max:50',
        //     'title'=>'required',
        // ],
        // [
        //     'name.required' => 'Batch must be inserted'
        // ]);
        Akbar::insert([
            'batch' => $request->batch,
            'title' => $request->title,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        return redirect()->to('all-sections')->with('inserted','Section added successfully');
    }
    public function edit($id)
    {
        $allsections = Akbar::find($id);
        return view('admin.section.edit', compact('allsections'));
    }
    public function update($id, Request $request)
    {
        $var = Akbar::find($id);
        $var->batch = $request->batch;
        $var->title = $request->title;

        if($var->save())
        {
            return redirect()->to('all-sections');
        }
    }
    public function delete($id)
    {
        $var = Akbar::find($id);
        if($var->delete())
        {
            return redirect()->to('all-sections');
        }
    }
}
