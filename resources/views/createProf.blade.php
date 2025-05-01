@extends('template')

@section('titre')
    Ajouter un professeur
@endsection

@section('contenu')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Création d'un professeur</h2>
            
            <form action="{{ route('professeur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                    <input type="text" class="form-input w-full @error('nom') border-red-500 @enderror" id="nom" name="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                    @error('nom')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom:</label>
                    <input type="text" class="form-input w-full @error('prenom') border-red-500 @enderror" id="prenom" name="prenom" placeholder="Votre prénom" value="{{ old('prenom') }}">
                    @error('prenom')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="matiere" class="block text-gray-700 text-sm font-bold mb-2">Matière:</label>
                    <input type="text" class="form-input w-full @error('matiere') border-red-500 @enderror" id="matiere" name="matiere" placeholder="Votre matiere" value="{{ old('matiere') }}">
                    @error('matiere')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="label">Classe</label>
                
                        @foreach($classes as $classe)
                        <input
                        type="checkbox"
                        name="classe_id[]"
                       value='{{ $classe->id }}'>

                       {{$classe->libelle}}
                       <br>
                        @endforeach
                   
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection