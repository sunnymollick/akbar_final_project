<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Session;
use App\Models\Section;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $allteachers = Teacher::join('courses','courses.id','teachers.course_id')
                                    ->join('departments','departments.id','teachers.dep_id')
                                    ->join('sessions','sessions.id','teachers.session_id')
                                    ->join('sections','sections.id','teachers.section_id')
                                    ->select('teachers.*','courses.name as course','departments.name as department','sessions.name as session','sections.batch')
                                    ->get();

        return view('admin.pages.teacher', compact('allteachers'));
    }
    public function create()
    {
        $courses = Course::all();
        $sessions = Session::where('status',1)->get();
        $sections = Section::all();
        $departments = Department::all();
        return view('admin.teacher.create', compact('courses','sessions','sections','departments'));
    }

    public function getCourseById($id){
        $courses = Course::where('dep_id',$id)->get();
        return response()->json([
            'courses' => $courses
        ]);
    }

    public function getSectionByBatchId($id){
        $sections = Section::find($id);
        return response()->json([
            'sections' => $sections
        ]);
    }

    public function store(Request $request){
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->address = $request->address;
        $teacher->phone_number = $request->phone_number;
        $teacher->dep_id = $request->dep_id;
        $teacher->course_id = $request->course_id;
        $teacher->session_id = $request->session_id;
        $teacher->section_id = $request->section_id;
        $teacher->section = $request->section;

        if ($teacher->save()) {
            return redirect()->to('all-teachers')->with('inserted','Teacher added successfully');
        }
    }

}
