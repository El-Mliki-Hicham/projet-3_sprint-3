@include("layouts.head")

<form method="POST" action="{{route("promotion.store")}}">
    @csrf
<input type="text" name="Name">
<button>add</button>
</form>
