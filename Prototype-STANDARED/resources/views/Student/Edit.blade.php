

<form method="POST" action="{{route("student.update",$student->id)}}">
    @method("PUT")
    @csrf
First name<input type="text" value="{{$student->First_name}}" name="First_name"><br>
Last name<input type="text" value="{{$student->Last_name}}" name="Last_name"><br>
Email<input type="text" value="{{$student->Email}}" name="Email"><br>
<button>add</button>
</form>
