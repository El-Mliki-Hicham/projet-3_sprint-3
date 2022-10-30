

<form method="POST" action="{{route("student.store")}}">
    @csrf
<input type="text" name="First_name">
<input type="text" name="Last_name">
<input type="text" name="Email">
<button>add</button>
</form>
