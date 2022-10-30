
<a href="{{route("student.create")}}"><button>add new</button></a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
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
