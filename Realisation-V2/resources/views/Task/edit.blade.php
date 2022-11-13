@extends('Master')
@section('content')


<div class="row editForm">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Editer Tache</h5>
        </div>
        <div class="card-body">
            <form action="{{route("task.update",$task->id)}}" method="post">
                @method("PUT")
                @csrf
            <div class="row">
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Nom tache</label>
                  <input type="text" class="form-control" placeholder="nom " value="{{$task->Nom_de_la_tache}}" name="task"  >
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-6 pr-md-1">
                <div class="form-group">
                  <label>Début Tache</label>
                  <input type="datetime-local" class="form-control" value="{{$task->Debut_de_la_tache}}"  name="date_debut"   >
                </div>
              </div>
              <div class="col-md-6 pl-md-1">
                <div class="form-group">
                  <label>Fin Tache</label>
                  <input type="datetime-local" class="form-control" value="{{$task->Fin_de_la_tache}}"  name="date_fin" >
                  <input   value="{{$brief_id}}"  name="brief_id" type="hidden"></div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Editer</button>
            </div>
          </form>
        </div>
    </div>
    <br>
    <a href="{{route("brief.edit",$brief_id)}}" class="btn btn-outline-dark">return</a>
    </div>

    @endsection
