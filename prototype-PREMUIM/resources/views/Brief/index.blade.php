
@include("welcome")
@include("layouts.head")

<br><br><a href="{{route("brief.create")}}"><button>add brief</button></a>

<table class="table-bordered" width="1000">
    <thead>
        <tr>

            <th>id</th>
            <th> Nom de la tâche</th>
            <th>Début de la tâche</th>
            <th>Fin_de la tâche</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($brief as $item )
        <tr>
            <td>{{$item->id}} </td>
            <td>{{$item->Nom_du_brief}} </td>
            <td>{{$item->Date_heure_de_livraison}}</td>
            <td>{{$item->Date_heure_de_récupération}}</td>
            <td class="d-flex justify-content-evenly" >
                <a href="{{route('brief.edit',$item->id)}}"><button class="btn btn-success" style="color: white">Edit</button></a>


                <form action="{{route('brief.destroy',$item->id)}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button  class="btn btn-danger">delete</button>
                </form>

                <button class="btn btn-info" >  <a style="color: white" href="{{route('assigner.show',$item->id)}}">assigner</a></button>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>



