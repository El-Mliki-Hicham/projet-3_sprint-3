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
        return redirect('brief')->with("status","Brief a été ajouter");
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
        $task = Briefs::find($id)->Tasks;

        // dd($brief);
        return view("brief.edit",compact("brief","task","id"));
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
        return redirect('brief/'.$id.'/edit')->with("status","Brief a été modifier");
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
        return redirect('brief')->with("status","Brief a été supprimer");
    }



    public function search(Request $request){

        if($request->ajax()){
            $input = $request->key;
            $output="";
            $brief=Briefs::where('Nom_du_brief','like',$input.'%')
            ->orWhere('id','like',$input."%")
        ->get();
        if($brief)
        {
        foreach ($brief as $value) {
            $output.='<tr>

              <td>'.$value->id.'</td>
              <td><a href="'.route('brief.edit',$value->id).'">'.$value->Nom_du_brief.'</a></td>

              <td>'.$value->Date_heure_de_livraison.'</td>
              <td>'.$value->Date_heure_de_récupération.'</td>
              <td class="td-btn" >

              <form action="'.route('promotion.destroy',$value->id).'" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="mbwRek5RvSWri9jAlOBQGv7ev7YyyUaKpf07ioez">
              <button class="delete" style="all: unset;cursor: pointer;color:red" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></button>

              </form>

              <form action="'.route('task.create').'">
              <input style="all: unset;cursor: pointer;color:red" name="brief_id" value="'.$value->id.'" type="hidden">

              <button class="" style="all: unset;cursor: pointer; color: rgb(250, 168, 61)" title="Add tasks"><i class="fa-solid fa-tasks"></i></button>
          </form>
          <button class="btn btn-info" >  <a style="color: white" href="'.route('assigner.show',$value->id).'">assigner</a></button>

              </td>
              </tr>';
            }

            return Response($output);
        }
    }
}
}
