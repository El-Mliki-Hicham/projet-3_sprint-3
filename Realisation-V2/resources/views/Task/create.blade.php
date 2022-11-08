@include("layouts.head")

<form action="{{route("task.store")}}" method="post">
    @csrf
     nom  task<input  name="task" type="text">
     date debut<input name="date_debut" type="datetime-local">
      dat fin<input name="date_fin" type="datetime-local">
     <input name="id_brief" value="{{$id}} " type="hidden">
    <button>ajouter</button>
</form>


<a href="{{route("brief.edit",$id)}}"><button>return</button></a>

