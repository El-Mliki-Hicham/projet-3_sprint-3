
@extends('Master')

@section('content')



<div class="container-fluid py-4">

<div class="row editForm">
    <div class="col-md-8">
      <div class="card">

        <div class="card-body">

          <form method="POST" action="{{route("promotion.store")}}">
           @csrf
            <div class="row">
              <div class="col-md-5 pr-md-1">
                <div class="form-group">
                  <label>Nom promotion</label>
                  <input type="text" class="form-control"  placeholder="nom"name="Name">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
