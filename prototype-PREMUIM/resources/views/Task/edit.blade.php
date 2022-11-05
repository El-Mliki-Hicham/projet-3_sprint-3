


<form action="{{route("task.update",$task->id)}}" method="post">
    @method("PUT")
    @csrf
     nom task<input value="{{$task->Nom_de_la_tâche}}" name="task" type="text">
     date fin<input  value="{{$task->Début_de_la_tâche}}"  name="date_debut" type="date">
     date debut<input  value="{{$task->Fin_de_la_tâche}}"  name="date_fin" type="date">
    <input   value="{{$brief_id}}"  name="brief_id" type="hidden">
    <button>ajouter</button>
</form>


<a href="{{route("brief.edit",$brief_id)}}"><button>return</button></a>

