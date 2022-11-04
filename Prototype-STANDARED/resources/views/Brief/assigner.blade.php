

<a href=""><button>Select All student </button></a>
<a href=""><button>Search </button></a>

<table>

    </thead>
    <tbody>
        @foreach ($AllStudent as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->First_name}} {{$item->Last_name}}</td>
            <td>+</td>
            <td>-</td>
        </tr>

        @endforeach
        @foreach ($brief_student as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->First_name}} {{$item->Last_name}}</td>
            <td>+</td>
            <td>-</td>
        </tr>

        @endforeach
    </tbody>

</table>



