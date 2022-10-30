


<form method="POST" action="{{route("task.update",$task->id)}}">
    @method("PUT")
    @csrf
<input type="text" value="{{$task->Task}}" name="task">
<button>Update</button>
</form>

