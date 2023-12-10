<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
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
    public function index($id)
    {

        $questions = Question::all()->where('exam_id','=',$id);
        return view('admin.question',compact('questions'));
    }


    public function edit($id)    {
        $question = Question::find($id);
        $exam = $question->exam;
        $questions = Question::all()->where('exam_id','=',$exam->id);
        return view('admin.question', compact('exam','questions','question'));
    }

    public function store(Request $request){

    // dd($request);
        $data = $request->all();
        $formData = [];
        // dd(empty($request->category));

        if(!empty($request->option4)){
            $formData['option4']=$data['option4'];
            $formData['option3']=$data['option3'];
            $formData['option2']=$data['option2'];
            $formData['option1']=$data['option1'];

        }
        $formData['type']=$data['type'];
        $formData['question']=$data['question'];
        $formData['correct_answers']=$data['correct_answers'];
        $formData['points_awarded']=$data['points_awarded'];
        $formData['exam_id']=$data['exam_id'];
        // dd($formData);
        Question::create($formData);
        return back();
    }
    public function update(Request $request,$id){

    // dd($request);
        $data = $request->all();
        dd(empty($request->category));
        $question = Question::find($id);

        if(!empty($request->option4)){
            $question->option4 = $data['option4'];
            $question->option3 = $data['option3'];
            $question->option2 = $data['option2'];
            $question->option1 = $data['option1'];

        }
        $question->type=$data['type'];
        $question->question=$data['question'];
        $question->correct_answers = $data['correct_answers'];
        $question->points_awarded = $data['points_awarded'];
        $question->exam_id = $data['exam_id'];
        $question->save();
        return back();
    }


}
