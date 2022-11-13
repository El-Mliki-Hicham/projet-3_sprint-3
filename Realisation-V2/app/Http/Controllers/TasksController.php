<?php

namespace App\Http\Controllers;

use App\Models\Briefs;
use App\Models\tasks;
use Egulias\EmailValidator\Warning\TLD;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $id = $request->brief_id;
        $task = Briefs::find($id)->Tasks;

        return view("task.index",compact("task","id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $id = $request->brief_id;

        return view("task.create",compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $task = new Tasks();
        $task->Nom_de_la_tache = $request->task;
        $task->Debut_de_la_tache= $request->date_debut;
        $task->Fin_de_la_tache= $request->date_fin;
        $task->briefs_id= $request->id_brief ;
        $task->save();
        return redirect('brief/'.$request->id_brief.'/edit' )->with("status","Tache a été ajouter");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        $brief_id = $task->briefs_id;


        return view("task.edit",compact("task","brief_id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {

        $task =Tasks::find($id);
        $task->Nom_de_la_tache = $request->task;
        $task->Debut_de_la_tache= $request->date_debut;
        $task->Fin_de_la_tache= $request->date_fin;
        $task->save();
        return redirect('brief/'.$request->brief_id.'/edit' )->with("status","Tache a été modifer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request ,$id )
    {
       $brief_id= $request->brief_id;
        Tasks::find($id)
        ->delete();

        return back()->with("status","Tache a été supprimer");
    }

       // search : live search students
       public function searchTasks(Request $request,$id){


        if($request->ajax()){

            $input = $request->key;
            $output="";
            $Task= tasks::select('*','tasks.id as task_id')->
        where([
            ["briefs_id", '=', $id],
            ['tasks.id', '=', $input],
        ])
    ->orWhere([
        ["briefs_id", '=', $id],
        ['Nom_de_la_tache','like',$input.'%']
        ])
     ->join("briefs","tasks.briefs_id","=","briefs.id")->get();

        if($Task)
        {

            foreach ($Task as $task) {

        $output.='<tr>
        <td>'.$task->task_id.'</td>
        <td>'.$task->Nom_de_la_tache.'</td>
        <td>'.$task->Debut_de_la_tache.'</td>
        <td>'.$task->Fin_de_la_tache.'</td>
                <td class="td-btn" >
                    <a href="'.route('task.edit',$task->task_id).'" class="" style="color: green" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                    <form action="'.route('task.destroy',$task->task_id).'" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="kQc2ICra4EEVEWE0kP1sRNV4JF2WSFqLs7XKsD52">
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
