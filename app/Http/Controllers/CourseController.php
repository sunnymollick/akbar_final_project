<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Session;
use App\Models\Course;
use Illuminate\Support\Carbon;
class CourseController extends Controller
{
    public function index()
    {
        return view('Admin.pages.course');
    }
    public function create()
    {
        $departments = Department::all();
        return view('course.create',['departments' => $departments]);
    }
    public function add(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required|unique:courses|max:50',
            'credit'=>'required|numeric',
            'dep_id'=>'required',
            'short_code' => 'required|unique:courses'
        ],
        [
            'name.required' => 'Name must be inserted'

        ]);
        Course::insert([
            'name' => $request->name,
            'credit' => $request->credit,
            'dep_id' => $request->dep_id,
            'short_code' => $request->short_code,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);
        return redirect()->to('all-courses')->with('inserted','course added successfully');
    }

    public function allcourses()
        {
            $allcourses = Course::all();
            return view('admin.pages.course', compact('allcourses'));
        }
    public function edit($id)
    {
        $allcourses = Course::find($id);
        return view('course.edit', compact('allcourses'));
    }
    public function update($id, Request $request)
    {
        $var = Course::find($id);
        $var->name = $request->name;
        $var->credit = $request->credit;
        $var->short_code = $request->short_code;
        
        if($var->save())
        {
            return redirect()->to('all-courses');
        }
    }
    public function delete($id)
    {
        $var = Course::find($id);
        if($var->delete())
        {
            return redirect()->to('all-courses');
        }
    }
}
