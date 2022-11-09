<?php

namespace App\Http\Controllers;

use App\Models\assigner;
use App\Models\Briefs;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Validation\Validator as ValidationValidator;

class AssignerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        // "student_id"=> 'multiple_unique:briefs_student,student_id,briefs_id',
        // dd($request->input());
        $assigner = new assigner();
        $assigner->student_id=$request->student_id;
        $assigner->briefs_id=$request->brief_id;
        $assigner->promotion_id=$request->promotion_id;
        $assigner->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assigner  $assigner
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        // $studentController =new StudentController;
        // $AllStudent = $studentController->index()->student;


        $AllStudent = assigner::select("*")
        ->rightJoin("students",'briefs_student.student_id',"students.id")
        // ->whereNotNull("students.id")
        ->where([
            ["students.id",">",0],
            // ["briefs_student.briefs_id",$id],
            ])
        ->get();
        // dd($AllStudent);



        $brief_student = Briefs::find($id);


        $brief_student = $brief_student->Student;
        // dd($brief_student);

        return view('Brief.assigner',compact("AllStudent",'brief_student',"id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assigner  $assigner
     * @return \Illuminate\Http\Response
     */
    public function edit(assigner $assigner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assigner  $assigner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assigner $assigner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assigner  $assigner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $brief_id=  $request->brief_id;
        assigner::where([
            ['student_id',$id],
            ['briefs_id',$brief_id]
        ])
        ->delete();
        return back();
    }
}
