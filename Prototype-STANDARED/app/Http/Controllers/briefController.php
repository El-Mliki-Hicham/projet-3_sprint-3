<?php

namespace App\Http\Controllers;

use App\Models\Briefs;
use App\Models\Student;
use Illuminate\Http\Request;

class briefController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brief = Briefs::all();
        return view("brief.index",compact("brief"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("brief.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $brief =new Briefs();
        $brief->Nom_du_brief = $request->Nom ;
        $brief->Date_heure_de_livraison =$request->Date_livraison ;
        $brief->Date_heure_de_récupération=$request->Date_recuperation ;
        $brief->save();
        return redirect('brief');
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
        $brief = Briefs::find($id);
        // dd($brief);
        return view("brief.edit",compact("brief"));
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

        $brief =Briefs::find($id);
        $brief->Nom_du_brief = $request->Nom ;
        $brief->Date_heure_de_livraison =$request->Date_livraison ;
        $brief->Date_heure_de_récupération=$request->Date_recuperation ;
        $brief->save();
        return redirect('brief');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brief =Briefs::find($id)->delete();
        return redirect('brief');
    }


    public function assigner ($id){
        $studentController =new StudentController;
        $AllStudent = $studentController->index()->student;

        $brief_student = Briefs::find($id);


        $brief_student = $brief_student->Student;
        // dd($brief_student);

        return view('Brief.assigner',compact("AllStudent",'brief_student',"id"));
    }


}
