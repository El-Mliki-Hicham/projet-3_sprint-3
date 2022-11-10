<div class="container-fluid py-4">



    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">
                  <a href="{{route("brief.create")}}">
                    <button class="btn btn-facebook">ajouter brief</button>
                </a>
                <div class="input-search-briefs">
                <input type="text" > search
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2"> Nom de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Début de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Fin_de la tâche</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($brief as $item )
                  <tr>
                    <td>{{$item->id}} </td>
                    <td>{{$item->Nom_du_brief}} </td>
                    <td>{{$item->Date_heure_de_livraison}}</td>
                    <td>{{$item->Date_heure_de_récupération}}</td>
                    <td>
                        <a href="{{route('brief.edit',$item->id)}}" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
                        {{-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a> --}}
                        <form action="{{route('brief.destroy',$item->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button  class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></button>
                        </form>
                        <button class="btn btn-info" >  <a style="color: white" href="{{route('assigner.show',$item->id)}}">assigner</a></button>
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


  </div>
