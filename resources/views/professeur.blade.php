@extends('template')
@section('titre')

<div class="d-flex justify-content-center">
  <h1>Les Professeurs</h1>
</div>

@endsection

@section('contenu')

<div class="d-flex justify-content-center mb-4">
  <a  class="btn btn-info" href="{{route('professeur.create')}}">Ajouter un professeur</a>
</div>


<div class="container">
    
    <div class="row">
        @foreach($profs as $prof)
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-header">{{ $prof->nom }}, {{$prof->prenom}} </h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $prof->matiere }}</h5>
                    <p class="card-text">
                        <strong>Classes :</strong>
                        <ul>
                            @foreach($prof->classes as $classe)
                            <li>{{ $classe->libelle }}</li>
                            @endforeach
                        </ul>
                    </p>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex">
  {!! $profs->links() !!}
</div>
@endsection