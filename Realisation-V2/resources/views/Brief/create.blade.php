<form action="{{route("brief.store")}}" method="post">
    @csrf
     nom brief<input name="Nom" type="text">
     nom brief<input name="Date_livraison" type="date">
     nom brief<input name="Date_recuperation" type="date">
    <button>ajouter</button>
</form>


<a href="{{route("brief.index")}}"><button>return</button></a>
