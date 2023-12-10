<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Models\Question;
use App\Models\Scheduling;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function browes(){
        $exams = Exams::all();
        return view('browes',compact('exams'));
    }
    public function take($id){
        $exam = Exams::find($id);
        $questions = Question::all()->where('exam_id','=',$id);
        return view('take',compact('questions','exam'));
    }
    public function future(){
        // $exam = Futture::all();
        return view('future');
    }
    public function dashboard(){
        $schedules = Scheduling::all();
        return view('dashboard',compact('schedules'));
    }
    public function help()
    {
        return view('help');
    }
        public function schedulestore(Request $request)
    {
        $data = $request->all();
        // dd($request);
        Scheduling::create($data);
        $schedules = Scheduling::all();
        // return back();
        return view('dashboard',compact('schedules'));

        // Route::view('dashboard',compact('schedules'));
    }

    public function schedule($id)
    {
        $exam = Exams::find($id);
        return view('schedule',compact('exam'));
    }
    public function result()
    {
        return view('results');
    }


}
