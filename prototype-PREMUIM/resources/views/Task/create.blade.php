<form action="{{route("task.store")}}" method="post">
    @csrf
     nom  task<input  name="task" type="text">
     date debut<input name="date_debut" type="date">
      dat fin<input name="date_fin" type="date">
     <input name="id_brief" value="{{$id}} " type="text">
    <button>ajouter</button>
</form>


<a href="{{route("brief.edit",$id)}}"><button>return</button></a>

