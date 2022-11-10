<?php

namespace App\Http\Controllers;

use App\Models\assigner;
use App\Models\Briefs;
use App\Models\Promotion;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Validation\Validator as ValidationValidator;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

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
        return back()->with('key',$request->student_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assigner  $assigner
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $students = Promotion::latest()->first()->Student;
        $brief = Briefs::where('id', $id)->firstOrFail();
        $assigner = array_map(function ($student) {
            return $student['id'];
            // dd($student)
        }, $brief->Student->toArray());


        $studentController =new StudentController;
        $StudentIndex = $studentController->index()->student;



        $promotionId= Promotion::select('*')
        ->latest()->take(1)->first();
        // dd($promotionId->id);


        $AllStudent = assigner::
        // select("briefs_id","students.id as id_student",'student_id',"students.First_name","students.promotion_id")
        select("*","students.id as id_s")
        ->rightJoin("students",'briefs_student.student_id',"students.id")
        // ->where("students.promotion_id",$promotionId)
        ->get() ;
        // dd($AllStudent);





        $brief_student = Briefs::find($id);
        $brief_student = $brief_student->Student->find($id);
        // dd($brief_student);

        return view('Brief.assigner',compact("AllStudent",'brief_student',"promotionId","StudentIndex","id","assigner","students","brief"));
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

    public function assignerAll()
    {
        $students = Promotion::latest()->first()->Student;

        foreach ($students as $student) {

            if (is_null(Briefs::find(request()->id)->Student()->find($student->id))) {
                assigner::create([
                    'student_id' => $student->id,
                    'briefs_id' => request()->id,
                    'promotion_id' => $student->promotion_id,
                ]);
            }
        };
        return back();
    }
}
