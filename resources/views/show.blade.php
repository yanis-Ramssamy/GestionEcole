@extends('template')

@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <img src="../photos2024_SLAM/{{$eleve->image}}">{{$eleve->prenom}} {{$eleve->nom}}
        </p>
    </header>
 <div class="card-content">
    <div class="content">
<p> Date de naissance :
    {{$eleve->dateNaiss}} 
</p>
   </div>
<div class="content">
    <p> Email:
        {{$eleve->email}} 
    </p>
</div>
   </div>
   <div class="d-flex justify-content-center mt-4">
        <a class="btn btn-info" href="{{url()->previous()}}" >Retour</a>
   </div>
</div>

@endsection