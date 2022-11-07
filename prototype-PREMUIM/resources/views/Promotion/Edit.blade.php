



<form method="POST" action="{{route("promotion.update",$promotion->id)}}">
    @method("PUT")
    @csrf
<input type="text" value="{{$promotion->Name_promotion}}" name="Name">
<button>Update</button>
</form>


<button><a href="{{route('student.create',$id)}}">add student</a></button>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>promotion id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($student as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->First_name}}</td>
            <td>{{$item->Last_name}}</td>
            <td>{{$item->Email}}</td>
            <td>{{$item->promotion_id}}</td>
            <td><a href="{{route("student.edit",$item->id)}}">Edit</a></td>
            <td>
            <form action="{{route("student.destroy",$item->id)}}" method='post'>
                @method("DELETE")
                @csrf
           <button> Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>

<button><a href="{{route('promotion.index')}} ">return</a></button>
