@extends('Master')
@section('content')

<div class="row editForm">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Ajouter Brief </h5>
        </div>
        <div class="card-body">
            <form action="{{route("brief.store")}}" method="post">
                @csrf
            <div class="row">
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Nom Brief</label>
                  <input type="text" class="form-control" placeholder="nom " name="Nom" >
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-6 pr-md-1">
                <div class="form-group">
                  <label>Date/Heure de livraison</label>
                  <input type="datetime-local" class="form-control" name="Date_livraison" >
                </div>
              </div>
              <div class="col-md-6 pl-md-1">
                <div class="form-group">
                  <label>Date/Heure de récupération </label>
                  <input type="datetime-local" class="form-control"  name="Date_recuperation">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajouter</button>
          </div>
        </form>
      </div>
      <br>
      <a  href="{{route("brief.index")}}"class="btn btn-outline-dark">Return</a>
    </div>

</div>
  @endsection

