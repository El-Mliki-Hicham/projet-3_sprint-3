

@extends('Master')
@section('content')

<div class="row editForm">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h2 class="title">Ajouter Apprenant </h2>
        </div>
        <div class="card-body">

            <form method="POST" action="{{route("student.store")}}">
             @csrf
            <div class="row">
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Nom </label>
                  <input type="text" class="form-control" placeholder="nom " name="First_name">
                </div>
              </div>
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Prenom </label>
                  <input type="text" class="form-control" placeholder="prenom" name="Last_name">
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-6 pr-md-1">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="email" name="Email" >

                </div>
              </div>
              <input type="hidden" value="{{$id}}" name="promotion_id">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
