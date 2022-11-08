@include("layouts.head")



<form action="{{route("task.update",$task->id)}}" method="post">
    @method("PUT")
    @csrf
     nom task<input value="{{$task->Nom_de_la_tache}}" name="task" type="text">
     date fin<input  value="{{$task->Debut_de_la_tache}}"  name="date_debut" type="datetime-local">
     date debut<input  value="{{$task->Fin_de_la_tache}}"  name="date_fin" type="datetime-local">
    <input   value="{{$brief_id}}"  name="brief_id" type="hidden">
    <button>ajouter</button>
</form>


<a href="{{route("brief.edit",$brief_id)}}"><button>return</button></a>

