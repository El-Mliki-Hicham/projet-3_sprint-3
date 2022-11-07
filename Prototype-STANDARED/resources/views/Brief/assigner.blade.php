{{--
<a href="{{$_SERVER['HTTP_REFERER']."?hello=true"}}"><button >Select All student </button></a>
<a><button>Search </button></a> --}}

<h1>deja assigner</h1>
<table>
    <tbody>


        @foreach ($brief_student as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->First_name}} {{$item->Last_name}}</td>

            <td>
                <form action="{{route('assigner.destroy',$item->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <button>-</button>
                </form>
            </td>

        </tr>

        @endforeach
    </tbody>
</table>

<h1>All student</h1>
<table>

    </thead>
    <tbody>
        @foreach ($AllStudent as $item )
        <tr>



            <td>{{$item->id}}</td>
            <td>{{$item->First_name}} {{$item->Last_name}}</td>
            <td>
                <form action="{{route("assigner.store")}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="student_id">
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <input type="submit" value="+">
                </form>
            </td>
            <td>-</td>
        </tr>

        @endforeach

    </tbody>


</table>

<button>
    <a href="{{route('brief.index')}}">return</a></button>



