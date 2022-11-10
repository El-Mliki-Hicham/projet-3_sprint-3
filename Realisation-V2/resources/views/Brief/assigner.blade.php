{{--
<a href="{{$_SERVER['HTTP_REFERER']."?hello=true"}}"><button>Select All student </button></a>
<a><button>Search </button></a> --}}
@extends("Master")
@section("content")
<div class="divFormAss">
    <a href="{{route('assigner.All',['id' => $id])}}"><button class="btn btn-success">Assigner touts</button></a>
</div>

@foreach ($students as $value)
@if (!in_array($value->id, $assigner))


<div class="divFormAss">
    <div class="col-md-12 mb-lg-0 mb-4 formAss" >
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
          <div class="row">
              <div class="col-6 d-flex align-items-center">

                </div>
                <div class="col-6 text-end">
                </div>
            </div>
            <form  action="{{route("assigner.store")}}" method="POST"style="padding-right: 1091px;">
                @csrf
                <input type="hidden" value="{{$value->id}}" name="student_id">
                <input type="hidden" value="{{$value->promotion_id}}" name="promotion_id">
                <input type="hidden" value="{{$id}}" name="brief_id">


                <button class="btn btn-warning">+</button>
            </form>
        </div>
        <div class="card-body p-3">
            <div class="row">

          <div class="col-md-12">
            <div class="card card-body  card-plain border-radius-lg d-flex align-items-center flex-row">

              <h2 class="mb-0">{{$value->First_name}} </h2>

            </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>

@else

<div class="divFormAss">
    <div class="col-md-12 mb-lg-0 mb-4 formAss" >
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
          <div class="row">
              <div class="col-6 d-flex align-items-center">

                </div>
                <div class="col-6 text-end">
                </div>
            </div>
            <form action="{{route('assigner.destroy',$value->id)}}" method="POST" style="padding-right: 1091px;">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{$value->id}}" name="student_id">
                <input type="hidden" value="{{$value->promotion_id}}" name="promotion_id">
                <input type="hidden" value="{{$id}}" name="brief_id">

                <button class="btn btn-danger btn-lg">-</button>
            </form>
        </div>
        <div class="card-body p-3">
            <div class="row">

          <div class="col-md-12">
            <div class="card card-body  card-plain border-radius-lg d-flex align-items-center flex-row">

              <h2 class="mb-0" style="color: red" >{{$value->First_name}} </h2>

            </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
@endif
@endforeach


<a href="{{route("brief.index")}}"><button>return</button></a>

        @endsection
