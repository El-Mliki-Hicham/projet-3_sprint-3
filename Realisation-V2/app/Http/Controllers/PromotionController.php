<?php

namespace App\Http\Controllers;

use App\Models\assigner;
use App\Models\Briefs;
use App\Models\Promotion;
use App\Models\Student;
use BaseConttroller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PromotionController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::all();
        return view('Promotion.index',compact("promotion"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = "test";
        return view('Promotion.create',compact("test"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion = New Promotion();
        $promotion->Name_promotion =$request->Name;
        $promotion->save();
        if ($promotion->save()) {
            return redirect("promotion")->with("status","Promotion a été ajouter");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {


        $brief = assigner::select("Nom_du_brief")
        ->where("briefs_student.promotion_id",$promotion->id)
        ->join("briefs",'briefs_student.briefs_id','=','briefs.id')

        ->groupByRaw('Nom_du_brief')
        ->get();
        $id = $promotion->id;

        $promotion = Promotion::find($promotion->id);
        $student =$promotion->Student;

        return view('Promotion.edit',compact("promotion","student","brief","id"));
    }

    /**
     * Update the  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {

      $promotion=  Promotion::find($promotion->id)
        ->update([
            'Name_promotion'=>$request->Name
        ]);
        return back()->with("status","Promotion a été modifier");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        Promotion::find($promotion->id)->delete();
        return back()->with("status","Promotion a été supprimer");
    }

    public function search(Request $request){

        if($request->ajax()){
            $input = $request->key;
            $output="";
            $Promotion=Promotion::where('Name_promotion','like',$input."%")
            ->orWhere('id','like','%'.$input."%")
        ->get();
        if($Promotion)
        {
        foreach ($Promotion as $promotion) {
            $output.='<tr>

              <td>'.$promotion->id.'</td>
              <td><a href="'.route('promotion.edit',$promotion->id).'">'.$promotion->Name_promotion.'</a></td>
              <td class="td-btn" >

              <form action="'.route('promotion.destroy',$promotion->id).'" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="mbwRek5RvSWri9jAlOBQGv7ev7YyyUaKpf07ioez">
              <button class="delete" style="all: unset;cursor: pointer;color:red" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></button>

              </form>

              </td>
              </tr>';
            }

            return Response($output);
        }
    }
}
}
