<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('create',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //받은 값을 전달
    {
        $this->validate($request, [
            'file_name' => 'required',
            'file_name.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:225556',
            'file_info' => 'required|max:150'
        ]);

        $image = $request->file('file_name');
        $name = $image->getClientOriginalName();
        $image->move(public_path('images'), $name);

        // if($request->hasfile('file_name')){
        //     foreach($request->file('file_name') as $image){
        //         $name = $image->getClientOriginalName();
        //         $image->move(public_path().'/images/', $name);
        //         $data = $name;
        //     }
        // }

        $form = new Form(); //Form모델을 상속받는 $form 객체 생성
        $form->file_name = $name;  
        $form->file_info = $request->file_info;
        $form->user_id = Auth::id();
        $form->save();
        return back()->with('success', 'Your images has been successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
