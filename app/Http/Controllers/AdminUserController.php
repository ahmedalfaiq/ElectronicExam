<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
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
        return view('admin.exam',compact('levels','departments'));
    }
    public function question()
    {
        $exams = Exams::all();
        return view('admin.question',compact('exams'));
    }

        public function store(Request $request){
        // dd($request);
            $formFields= $request->validate([
                "category_id" => "required|numeric",
                "name" => "required",
                'image' => 'required',
                'price' => 'required',
                'description' => 'required',
                ]);
                $data = $request->all();
                $data = $request->all();
                $file_url=$data['image'];
                $input = time().'.'.$file_url->getClientOriginalExtension();
                $destinationPath = 'storage/product';
                $file_url->move($destinationPath, $input);

                $formData=[];
                $formData['image']=$input;
                $formData['name']=$data['name'];
                $formData['price']=$data['price'];
                $formData['description']=$data['description'];
                $formData['category_id']=$data['category_id'];
                // dd($formData);
                User::create($formData);
            return back();
    }


    public function show($id){
        $product = User::find($id);
        $products = User::all();
        return view('admin.product', compact('products','categories','product'));

    }

    public function edit($id)    {

    }

    public function update(Request $request, $id){
        $product = User::find($id);
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
        User::destroy($id);
        return back();
    }




}
