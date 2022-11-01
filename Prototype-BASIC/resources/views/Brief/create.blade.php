{{$brief}}
<form action="{{route("brief.store")}}" method="post">
    @csrf
     nom brief<input value="{{$brief->Nom_du_brief}}" name="Nom" type="text">
     nom brief<input name="Date_livraison" type="date">
     nom brief<input name="Date_recuperation" type="date">
    <button>ajouter</button>
</form>


<a href="{{route("brief.index")}}"><button>return</button></a>
{{-- <td>{{$item->id}} </td>
<td>{{$item->Nom_du_brief}} </td>
<td>{{$item->Date_heure_de_livraison}}</td>
<td>{{$item->Date_heure_de_récupération}}</td> --}}
