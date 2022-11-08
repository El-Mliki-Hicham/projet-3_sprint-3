@include("layouts.head")
@include("welcome")

<br><br>
<a href="{{route("promotion.create")}}"><button>add promotion</button></a>
<br><br>
<table class="table-bordered" width="500">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name promotion</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach  ($promotion as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->Name_promotion}}</td>
            <td class="d-flex"><a class="btn btn-success" href="{{route("promotion.edit",$item->id)}}">Edit</a>

            <form action="{{route("promotion.destroy",$item->id)}}" method='post'>
                @method("DELETE")
                @csrf
           <button class="btn btn-danger" style="margin-left"> Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
