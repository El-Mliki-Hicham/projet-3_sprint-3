{{--
<a href="{{$_SERVER['HTTP_REFERER']."?hello=true"}}"><button>Select All student </button></a>
<a><button>Search </button></a> --}}
<link rel="stylesheet" href="{{asset("css/assigner.css")}}">
{{$promotionId->id}}
@php
foreach($AllStudent as $value){


if($value->promotion_id == $promotionId->id){
echo $value;
}

}
@endphp

<h1>All student</h1>
<table>

    </thead>
    <tbody>

        @foreach ($AllStudent as $item )

        @if($item->promotion_id == $promotionId->id && $item->briefs_id == $id  )





        <tr>



            <td>{{$item->id_s}}</td>
            <td class="">{{$item->First_name}} {{$item->Last_name}}</td>

            <td>
                <form action="{{route("assigner.store")}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$item->id_s}}" name="student_id">
                    <input type="hidden" value="{{$item->promotion_id}}" name="promotion_id">
                    <input type="hidden" value="{{$id}}" name="brief_id">
                    <input type="button" style="background-color:red " value="+" readonly>
                </form>
            </td>
            <td>



                <form action="{{route('assigner.destroy',$item->id_s)}}" method="post">
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






        @endif
        @endforeach

        @if (session("key"))

               @php

             $session =  session("key");
               @endphp
        @else
        {{$session = "a"}}
        @endif

{{$session}}
        {{$StudentIndex}}
        @foreach ($StudentIndex as $itemm )

            @if ($itemm->promotion_id == $promotionId->id && $itemm->student_id == $session  )



            <tr>
             <td>{{$itemm->id}}</td>
            <td class="">{{$itemm->First_name}} {{$itemm->Last_name}}</td>


        <td>
            <form action="{{route("assigner.store")}}" method="post">
                @csrf
                <input type="hidden" value="{{$itemm->id}}" name="student_id">
                <input type="hidden" value="{{$itemm->promotion_id}}" name="promotion_id">
                <input type="hidden" value="{{$id}}" name="brief_id">
                <input type="submit" value="+">
            </form>
        </td>
        <td> <input type="submit" value="-" readonly></td>
    </tr>


    @endif

    @endforeach

    </tbody>


</table>

<a href="{{route("brief.index")}}"><button>return</button></a>
