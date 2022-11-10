{{--
<a href="{{$_SERVER['HTTP_REFERER']."?hello=true"}}"><button>Select All student </button></a>
<a><button>Search </button></a> --}}
<link rel="stylesheet" href="{{asset("css/assigner.css")}}">


<a href="{{route("brief.index")}}"><button>return</button></a>




      <h2>
    </h2>
   <button> <a href="{{route('assigner.All',['id' => $id])}}"class="btn btn-primary">All</a></button>
    @foreach ($students as $value)
@if (!in_array($value->id, $assigner))
    <p>{{$value->First_name}} <p>
        <form action="{{route("assigner.store")}}" method="POST"style="padding-right: 1091px;">
            @csrf
            <input type="hidden" value="{{$value->id}}" name="student_id">
            <input type="hidden" value="{{$value->promotion_id}}" name="promotion_id">
            <input type="hidden" value="{{$id}}" name="brief_id">

        <button class="btn btn-primary btn-lg">+</button>

    </form>
@else
<tr>
<td>
    <p style="color: red">{{$value->First_name}} <p></td>

   <td> <form action="{{route('assigner.destroy',$value->id)}}" method="POST" style="padding-right: 1091px;">
        @csrf
        @method('DELETE')
        <input type="hidden" value="{{$value->id}}" name="student_id">
        <input type="hidden" value="{{$value->promotion_id}}" name="promotion_id">
        <input type="hidden" value="{{$id}}" name="brief_id">

        <button class="btn btn-danger btn-lg">-</button>
    </form>

</td>
</tr>
@endif

@endforeach

<a href="{{route('brief.index')}}">Retourn</a>
