


<form action="{{route("brief.update",$brief->id)}}" method="post">
    @method("PUT")
    @csrf
     nom brief<input value="{{$brief->Nom_du_brief}}" name="Nom" type="text">
     nom brief<input  value="{{$brief->Date_heure_de_livraison}}"  name="Date_livraison" type="date">
     nom brief<input  value="{{$brief->Date_heure_de_récupération}}"  name="Date_recuperation" type="date">
    <button>ajouter</button>
</form>




<a href="{{route("brief.index")}}"><button>return</button></a>

