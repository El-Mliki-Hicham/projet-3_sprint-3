

{{$task}}
<form action="{{route("task.update",$task->id)}}" method="post">
    @method("PUT")
    @csrf
     nom task<input value="{{$task->Nom_de_la_tâche}}" name="task" type="text">
     date fin<input  value="{{$task->Début_de_la_tâche}}"  name="date_debut" type="date">
     date debut<input  value="{{$task->Fin_de_la_tâche}}"  name="date_fin" type="date">
    <button>ajouter</button>
</form>


<a href="{{route("brief.index")}}"><button>return</button></a>

