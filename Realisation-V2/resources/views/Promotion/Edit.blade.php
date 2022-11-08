@include("layouts.head")




<form method="POST" action="{{route("promotion.update",$promotion->id)}}">
    @method("PUT")
    @csrf
<input type="text" value="{{$promotion->Name_promotion}}" name="Name">
<button>Update</button>
</form>

<br>
<br>

@foreach ($brief as $brief )

<h2>{{$brief->Nom_du_brief}} </h2>
@endforeach
<br><br>

<button class="btn btn-primary" ><a href="{{route('student.create',$id)}}" style="color: white">add student</a></button>
<br>
<br>

<table class="table-bordered">
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
            <td class="d-flex"><a href="{{route("student.edit",$item->id)}}" class="btn btn-success">Edit</a>

            <form action="{{route("student.destroy",$item->id)}}" method='post'>
                @method("DELETE")
                @csrf
           <button class="btn btn-danger" > Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>


<button><a href="{{route('promotion.index')}} ">return</a></button>



