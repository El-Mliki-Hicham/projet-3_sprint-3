

<form method="POST" action="{{route("task.store")}}">
    @csrf
<input type="text" name="task">
<button>add</button>
</form>
