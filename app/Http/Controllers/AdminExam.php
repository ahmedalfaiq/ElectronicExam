<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminExam extends Controller
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
        $exams = Exams::all();
        return view('admin.exam',compact('levels','departments','exams'));
    }
    public function store(Request $request){

    // dd($request);
            $data = $request->all();
            $file_url=$data['image'];
            // $input = time().'.'.$file_url->getClientOriginalExtension();
            $input = time().'.'.request()->file('image')->getClientOriginalExtension();
            $file_url->move('storage/exam', $input);

            $formData=[];
            $formData['image']=$input;
            $formData['title']=$data['title'];
            $formData['duration']=$data['duration'];
            $formData['subject']=$data['subject'];
            $formData['description']=$data['description'];
            $formData['dept_id']=$data['dept_id'];
            $formData['level_id']=$data['level_id'];
            $formData['instructor_id']="1";
            $formData['start_datetime']=$data['start_datetime'];
            $formData['end_datetime']=$data['end_datetime'];
            // dd($formData);
        Exams::create($formData);
        return back();
    }


    public function show($id){
        $product = Exams::find($id);
        $products = Exams::all();
        return view('admin.product', compact('products','categories','product'));

    }

    public function edit($id)    {
        $exam = Exams::find($id);
        $questions = Question::all()->where('exam_id','=',$id);
        return view('admin.question', compact('exam','questions'));
    }

    public function update(Request $request, $id){
        $product = Exams::find($id);
        $formFields= $request->validate([
            "category_id" => "required|numeric",
            "name" => "required",
            'price' => 'required',
            'description' => 'required',
            ]);
            $data = $request->all();
            $input = $product->image;
            if($request->hasFile('image')){

                $file_url=$data['image'];
                Storage::delete('storage/product/'.$product->image);
                $input = time().'.'.$file_url->getClientOriginalExtension();
                $destinationPath = 'storage/product';
                $file_url->move($destinationPath, $input);
            }

            $data['image']=$input;
            // $formData['course_id'] =$data['course_id'];
            // $formData['name'] =$data['name'];
            // dd($formData)
            $product->update($data);
        return back();

    }



    public function delete($id){
        Exams::destroy($id);
        return back();
    }


}


