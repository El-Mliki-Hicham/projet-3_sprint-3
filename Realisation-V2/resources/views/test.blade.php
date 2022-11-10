@extends("Master")
@section('content')

<div class="container-fluid py-4">






    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">

                <form method="POST" action="{{route("promotion.update",$promotion->id)}}">
                    @method("PUT")
                    @csrf
                <input type="text" value="{{$promotion->Name_promotion}}" name="Name">
                <button>Update</button>
                </form>

                <div class="input-search-briefs">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline inputsearch">
                          <label class="form-label">Type here...</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
              </div>
              </h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($student as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->First_name}}</td>
            <td>{{$item->Last_name}}</td>
            <td>{{$item->Email}}</td>
                    <td class="td-btn" >
                        <a href="{{route('student.edit',$item->id)}}" class="" style="color: green" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                        <form action="{{route('student.destroy',$item->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button class="delete" style="all: unset;cursor: pointer;color:red" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></button>

                        </form>
                        <button class="btn btn-info" >  <a style="color: white" href="{{route('assigner.show',$item->id)}}">assigner</a></button>
                    </td>

                  </tr>
                  @endforeach



                </tbody>
              </table>
              <button><a href="{{route('promotion.index')}} ">return</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>


    @endsection
