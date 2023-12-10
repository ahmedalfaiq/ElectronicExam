<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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
        $levels = Level::all();
        $departments = Departments::all();
        return view('admin.level',compact('levels'));
    }
    public function store(Request $request){
        // dd($request);
        $formFields= $request->validate([
            "name" => "required",
            ]);
            $data = $request->all();

            $formData=[];
            $formData['name']=$data['name'];
            // dd($formData);
            Level::create($formData);
        return back();
    }


    public function show($id){
        $level = Level::find($id);
        $levels = Level::all();
        return view('admin.levels', compact('levels','level'));

    }

    public function edit($id)    {

    }

    public function update(Request $request, $id){
        $levels = Level::find($id);
            $data = $request->all();

            // $formData['course_id'] =$data['course_id'];
            $formData['name'] =$data['name'];
            // dd($formData)
            $levels->update($data);
        return back();

    }



    public function delete($id){
        Level::destroy($id);
        return back();
    }


}


