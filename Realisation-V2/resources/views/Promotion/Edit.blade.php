@extends("Master")
@section('content')

<div class="container-fluid py-4">


        <h2 id="title" onclick="showForm()">{{$promotion->Name_promotion}}</h2>

    <form method="POST"  action="{{route("promotion.update",$promotion->id)}}">
        @method("PUT")
        @csrf
    <input type="hidden" id="input" value="{{$promotion->Name_promotion}}" name="Name">
    <input type="hidden" id="btn" value="Update">
    </form>


    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">

                <a href="{{route('student.create',$id)}}"><button class="btn btn-outline-light">ajouter apprenant</button></a>
                <div class="input-search-briefs">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline inputsearch">
                          <label class="form-label"  style="color: white">Search</label>
                          <input type="text" id="search" class="form-control form-color">
                          <input type="hidden" value="{{$promotion->id}} " id="searchID" class="form-control">
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prenom</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>

                </tr>
                </thead>
                <tbody id="tbody">
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

                    </td>

                  </tr>
                  @endforeach



                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
</div>
<a href="{{route('promotion.index')}} "><button class="btn btn-outline-dark">Return</button></a>


  </div>
  <script>
  let input = document.querySelector('#input');
let title = document.querySelector('#title');
let btn = document.querySelector('#btn');



function showForm(){
    input.setAttribute("type", "text");
    btn.setAttribute("type", "submit");

    title.style.display = "none"

}

$('#search').on('keyup',function(){
        $id= $("#searchID").val();

    $value=$(this).val();
    $.ajax({
        type : 'get',
        // url :  "../../searchStudent"+$id,
        url : '{{URL::to('searchStudent/'.$id)}}',
        data:{'key':$value},
        success:function(data){
            $('#tbody').html(data);
        }
    });
    })

  </script>

  {{-- <script src="{{asset('assets/js/searchStudent.js')}}"></script> --}}

    @endsection
