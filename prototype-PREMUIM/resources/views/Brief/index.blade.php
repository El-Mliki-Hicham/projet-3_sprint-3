

<a href="{{route("brief.create")}}"><button>add</button></a>

<table>
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
            <td>
                <a href="{{route('brief.edit',$item->id)}}"><button>Edit</button></a>
                </td>
            <td>
                <form action="{{route('brief.destroy',$item->id)}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button>delete</button>
                </form>
            </td>



        </tr>
        @endforeach
    </tbody>

</table>



