
@include("layouts.head")



<form action="{{route("brief.update",$brief->id)}}" method="post">
    @method("PUT")
    @csrf
     nom brief<input value="{{$brief->Nom_du_brief}}" name="Nom" type="text">
     nom brief<input  value="{{$brief->Date_heure_de_livraison}}"  name="Date_livraison" type="date">
     nom brief<input  value="{{$brief->Date_heure_de_récupération}}"  name="Date_recuperation" type="date">
    <button>ajouter</button>
</form>


<form action="{{route('task.create')}}" method="get">
    <input name="brief_id" value="{{$brief->id}}" type="hidden">

    <button>add task</button>
</form>

<table class="table">
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
        @foreach ($task as $item )
        <tr>
            <td>{{$item->id}} </td>
            <td>{{$item->Nom_de_la_tache}} </td>
            <td>{{$item->Debut_de_la_tache}}</td>
            <td>{{$item->Fin_de_la_tache}}</td>
            <td>

                <a href="{{route('task.edit',$item->id)}}"><button>Edit</button></a>

                <form action="{{route('task.destroy',$item->id)}}" method="POST">
                    @method("DELETE")
                    <input type="hidden" value="{{$id}}" name="brief_id">

                    @csrf
                    <button>delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>








<a href="{{route("brief.index")}}"><button>return</button></a>

