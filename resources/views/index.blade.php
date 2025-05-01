@extends('template')



@section('titre')

Bienvenue les éléves 



@endsection


@section('contenu')


<div class="d-flex justify-content-center mb-4">
  {{-- Bouton pour accéder à la page des professeurs --}}
  <a class="btn btn-primary" href="{{ route('professeur.index') }}">Voir les Professeurs</a>
</div>
<table class="table table-bordered">
  <thead>
    <tr class="table-primary">
     
      <th scope="col">First</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Détails</th>
      <th scope="col">Suppression</th>
      <th scope="col">Modification</th>
    </tr>
  </thead>
  <tbody>



        @foreach ($eleves as  $eleve)  
      <tr>
        <td>{{$eleve->id}}</td>
        <td>{{$eleve->nom}}</td>
        <td>{{$eleve->prenom}}</td> 
        <td><a href="{{route('eleve.show', $eleve->id)}}" type="button" class="btn btn-success">voir</a></td> 
        <td><form action="{{route('eleve.destroy',$eleve->id)}}" method="POST">
          @csrf 
          @method ('DELETE')
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
          </td>
          <td> 
             <button><a href="{{route('eleve.edit', $eleve->id)}}" type ="button" class="btn btn-warning" >modifier un élève  </a></button> 
          </td>  
        
        
          
      </tr>
    @endforeach
      </tbody>
    </table>


    <div class="row jusitify-content-center">
      <div class="col">
        <select class="form-select" onchange="window.location.href=this.value">
          <option value="{{route('eleve.index')}}" @unless($slug)selected @endunless>
            Toutes les classes
           </option>
           @foreach($classes as $classe)
           <option value="{{route('eleves.classe', $classe->slug)}}" {{$slug == $classe->slug ? 'selected' : ''}}>
          {{$classe->libelle}}
           </option>
            @endforeach
        </select>
      </div>
    </div>
    <td> 
      <button><a href="{{route('eleve.create')}}" class="btn btn-primary" >ajouter un élève  </a></button>
    </td>  
     
    <td> 
      {{-- <button><a href="{{route('eleve.update')}}" class="btn btn-warning" >modifier un élève  </a></button> --}}
    </td>  
    <div class="d-flex">
      {!! $eleves->links() !!}
    </div>
@endsection

@if(session()->has('info'))
<div class="lert alert-info alert-dismissible fade show js-alert" role="alert">
<strong>  {{session("info")}} </strong>
</div>
@endif