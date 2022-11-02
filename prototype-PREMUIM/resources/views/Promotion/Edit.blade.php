

@foreach ($promotion as $item )

<form method="POST" action="{{route("promotion.update",$item->id)}}">
    @method("PUT")
    @csrf
<input type="text" value="{{$item->Name_promotion}}" name="Name">
<button>Update</button>
</form>
@endforeach
