@include("welcome")
<br><br>
<a href="{{route("promotion.create")}}"><button>add promotion</button></a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name promotion</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($promotion as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->Name_promotion}}</td>
            <td><a href="{{route("promotion.edit",$item->id)}}">Edit</a></td>
            <td>
            <form action="{{route("promotion.destroy",$item->id)}}" method='post'>
                @method("DELETE")
                @csrf
           <button> Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
