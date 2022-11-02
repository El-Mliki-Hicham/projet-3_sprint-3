
<form action="{{route("task.create")}}" method="get">
    <input type="hidden" value="{{$id}}" name="brief_id">
<button>add</button>

</form>

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
        @foreach ($task as $item )
        <tr>
            <td>{{$item->id}} </td>
            <td>{{$item->Nom_de_la_tâche}} </td>
            <td>{{$item->Début_de_la_tâche}}</td>
            <td>{{$item->Fin_de_la_tâche}}</td>
            <td>

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



