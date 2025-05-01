@extends('template')

@section('titre')
    Ajouter un élève
@endsection

@section('contenu')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Création d'un élève</h2>
            
            <form action="{{ route('eleve.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="dateNaiss" class="block text-gray-700 text-sm font-bold mb-2">Date de naissance:</label>
                    <input type="date" class="form-input w-full @error('dateNaiss') border-red-500 @enderror" id="dateNaiss" name="dateNaiss" value="{{ old('dateNaiss') }}">
                    @error('dateNaiss')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" class="form-input w-full @error('image') border-red-500 @enderror" id="image" name="image">
                    @error('image')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" class="form-input w-full @error('email') border-red-500 @enderror" id="email" name="email" placeholder="votre@email.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="label">Classe</label>
                    <select class="form-select"  name="classe_id">
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                        @endforeach
                    </select>
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