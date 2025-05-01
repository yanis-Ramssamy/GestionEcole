@extends('template')


@section('contenu')
<form action="{{route('eleve.update', $eleve->id)}}"  method="POST" enctype="multipart/form-data">
@csrf
@method('put')
<div class="mb-3">
    <label  for="nom" class="form-label">Entrez le nom</label>
<input type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $eleve->nom)}}" id="nom" placeholder="Votre nom">
@error('nom')
<div class="invalid-feedback">{{$mesage}} </div>
@enderror
<div class="mb-3">
  <label  for="prenom" class="form-label">Entrez le prenom</label>
<input type="text" class="form-control  @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom', $eleve->prenom)}}" id="prenom" placeholder="Votre prenom">
@error('prenom')
<div class="invalid-feedback">{{$mesage}} </div>
@enderror
<div class="mb-3">
  <label  for="dateNaiss" class="form-label">Entrez la date</label>
<input type="text" class="form-control  @error('dateNaiss') is-invalid @enderror" name="dateNaiss" value="{{ old('dateNaiss', $eleve->dateNaiss)}}" id="dateNaiss" placeholder="Votre date de naissance">
@error('dateNaiss')
<div class="invalid-feedback">{{$message}} </div>
@enderror
<div class="mb-3">
  <label  for="image" class="form-label">Entrez l'image</label>
<input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" value="{{ old('image', $eleve->image)}}" id="image" placeholder="Votre photo">
@error('image')
<div class="invalid-feedback">{{$message}} </div>
@enderror
<div class="mb-3">
  <label  for="email" class="form-label">Entrez l'email</label>
<input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email', $eleve->email)}}" id="email" placeholder="Votre email">
@error('email')
<div class="invalid-feedback">{{$message}} </div>
@enderror



<div class="flex items-center justify-center">
  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Envoyer
  </button>
</div>
 


</form>
  

@endsection