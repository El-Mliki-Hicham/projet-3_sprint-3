@include("layouts.head")


<form method="POST" action="{{route("student.store")}}">
    @csrf
<input type="text" name="First_name">
<input type="text" name="Last_name">
<input type="text" name="Email">
<input type="hidden" value="{{$id}}" name="promotion_id">
<button>add</button>
</form>
