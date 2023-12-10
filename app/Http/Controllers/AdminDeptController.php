<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use Illuminate\Http\Request;

class AdminDeptController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $departments = Departments::all();
        return view('admin.department',compact('departments'));
    }
    public function store(Request $request){
        // dd($request);
        $formFields= $request->validate([
            "name" => "required",
            ]);

            $formData=[];
            $formData['name']=$formFields['name'];
            // dd($formData);
            Departments::create($formData);
        return back();
    }


    public function show($id){
        $level = Departments::find($id);
        $levels = Departments::all();
        return view('admin.departments', compact('levels','level'));

    }

    public function edit($id){
        $department = Departments::find($id);
        $departments = Departments::all();
        return view('admin.department', compact('departments','department'));
    }

    public function update(Request $request, $id){
        $departments = Departments::find($id);
            $data = $request->all();

            // $formData['course_id'] =$data['course_id'];
            $formData['name'] =$data['name'];
            // dd($formData)
            $departments->update($data);
        return back();

    }



    public function delete($id){
        Departments::destroy($id);
        return back();
    }

}
