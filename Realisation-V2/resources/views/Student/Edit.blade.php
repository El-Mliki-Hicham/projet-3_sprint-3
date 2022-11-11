@extends('Master')
@section('content')


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card">

            <div class="card-body">
                <form method="POST" action="{{route("student.update",$student->id)}}">
                    @method("PUT")
                    @csrf

                <div class="row">
                  <div class="col-md-5 pr-md-1">
                    <div class="form-group">
                      <label>Nom </label>
                      <input type="text" class="form-control" placeholder="nom " value="{{$student->First_name}}" name="First_name">
                    </div>
                  </div>
                  <div class="col-md-5 pr-md-1">
                    <div class="form-group">
                      <label>Prenom </label>
                      <input type="text" class="form-control" value="{{$student->Last_name}}" name="Last_name">
                    </div>
                  </div>


                </div>
                <div class="row">
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" value="{{$student->Email}}" name="Email">
                     <input type="hidden" value="{{$student->promotion_id}}" name="promotion_id">
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Editer</button>
            </div>
          </form>

        </div>

        @endsection
