{{--
<a href="{{$_SERVER['HTTP_REFERER']."?hello=true"}}"><button >Select All student </button></a>
<a><button>Search </button></a> --}}
<link rel="stylesheet" href="{{asset("css/assigner.css")}}">



<h1>All student</h1>
<table>

    </thead>
    <tbody>

        @foreach ($AllStudent as $item )
        <tr>


            <td>{{$item->id}}</td>
            <td class="" >{{$item->First_name}} {{$item->Last_name}}</td>
            @if ($item->briefs_id == $id)

            <td>
                <form action="{{route("assigner.store")}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="student_id">
                    <input type="hidden" value="{{$item->promotion_id}}" name="promotion_id">
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <input type="button" style="background-color:red " value="+" readonly>
                </form>
            </td>
           <td>



                <form action="{{route('assigner.destroy',$item->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <button>-</button>
                </form>
            </form>

            <script>

            </script>

           </td>


        </tr>


            @else

            <td>
                <form action="{{route("assigner.store")}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="student_id">
                    <input type="hidden" value="{{$item->promotion_id}}" name="promotion_id">
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <input type="submit" value="+">
                </form>
            </td>
           <td> <input type="submit" value="-" readonly></td>
            @endif




        @endforeach
    </tbody>


</table>

<a href="{{route("brief.index")}}"><button>return</button></a>


