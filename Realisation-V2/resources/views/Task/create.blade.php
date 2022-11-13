@extends('Master')
 @section('content')

<div class="row editForm">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Ajouter tache</h5>
        </div>
        <div class="card-body">
            <form action="{{route("task.store")}}" method="post">
                @csrf
            <div class="row">
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Nom tache</label>
                  <input type="text" class="form-control" placeholder="nom " name="task">
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-6 pr-md-1">
                <div class="form-group">
                  <label>Début de la Tache</label>
                  <input type="datetime-local" class="form-control" name="date_debut">
                </div>
              </div>
              <div class="col-md-6 pl-md-1">
                <div class="form-group">
                  <label>Fin de la Tache</label>
                  <input type="datetime-local" class="form-control" name="date_fin">
                </div>
              </div>
              <input name="id_brief" value="{{$id}} " type="hidden">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
      <br>
       <a href="{{route("brief.edit",$id)}}" class='btn btn-outline-dark'>return</a>
    </div>
</div>

@endsection


