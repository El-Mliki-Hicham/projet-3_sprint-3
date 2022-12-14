@extends("Master")
@section('content')
    <div class="divFormEdit">
    <h2 id="title" onclick="showForm()">{{$brief->Nom_du_brief}}</h2>
<div id="div" >
<form action="{{route("brief.update",$brief->id)}}" method="post">
    @method("PUT")
    @csrf
     nom brief<input value="{{$brief->Nom_du_brief}}" name="Nom" type="text">
     Date livraison<input  value="{{$brief->Date_heure_de_livraison}}"  name="Date_livraison" type="date">
     Date de récupération<input  value="{{$brief->Date_heure_de_récupération}}"  name="Date_recuperation" type="date">
    <button>edit</button>
</form>
</div>
</div>

    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">
                    <form action="{{route('task.create')}}" method="get">
                        <input style="all: unset;cursor: pointer;color:red" name="brief_id" value="{{$brief->id}}" type="hidden">

                        <button class='btn btn-outline-light'>Ajouter tache</button>
                    </form>
                    <div class="input-search-briefs">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div   style="margin-top: -22px;" class="input-group input-group-outline inputsearch">
                                <label class="form-label"  style="color: white">Search</label>
                          <input type="text" id="search" class="form-control form-color">
                          <input type="hidden" value="{{$brief->id}} " id="searchID" class="form-control">
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-secondary text-xxs  font-weight-bolder opacity-7"> Nom de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs  font-weight-bolder opacity-7">Début de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs  font-weight-bolder opacity-7">Fin_de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">action</th>
                </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($task as $item )
                    <tr>
                        <td>{{$item->id}} </td>
                        <td>{{$item->Nom_de_la_tache}} </td>
                        <td>{{$item->Debut_de_la_tache}}</td>
                        <td>{{$item->Fin_de_la_tache}}</td>
                    <td class="td-btn" >
                        <a href="{{route('task.edit',$item->id)}}" class="" style="color: green" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                        <form action="{{route('task.destroy',$item->id)}}" method="POST">
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
<a href="{{route("brief.index")}}"><button class="btn btn-outline-dark">return</button></a>


  </div>
  <script>

  let title = document.querySelector('#title');
  let div = document.querySelector('#div');

  div.style.display = "none"

  function showForm(){

      title.style.display = "none"
      div.style.display = "inline"


  }


$('#search').on('keyup',function(){
        $id= $("#searchID").val();

    $value=$(this).val();
    $.ajax({
        type : 'get',
        // url :  "../../searchStudent"+$id,
        url : '{{URL::to('searchTasks/'.$id)}}',
        data:{'key':$value},
        success:function(data){
            $('#tbody').html(data);
        }
    });
    })


</script>

    @endsection
