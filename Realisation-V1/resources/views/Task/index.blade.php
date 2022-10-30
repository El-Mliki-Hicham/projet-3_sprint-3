

<a href="{{route("task.create")}}"><button>add new</button></a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Task</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($task as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->Task}}</td>
            <td><a href="{{route("task.edit",$item->id)}}">Edit</a></td>
            <td>
            <form action="{{route("task.destroy",$item->id)}}" method='post'>
                @method("DELETE")
                @csrf
           <button> Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
