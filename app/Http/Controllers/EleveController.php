<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Eleve, Classe};
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EleveRequest;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = null):View
    {
        $query=$slug ? Classe::whereSlug($slug)->firstOrFail()->eleves() : Eleve::query();
        $eleves=$query->paginate(5);
        $classes=Classe::all();
         return view('index', compact('eleves','classes','slug'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $classes=Classe::all();
        return view('create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveRequest $eleveRequest) : RedirectResponse
    {
      
        
        $eleve= new Eleve();
        $eleve->nom=$eleveRequest->input('nom');
        $eleve->prenom=$eleveRequest->input('prenom');
        $eleve->dateNaiss=$eleveRequest->input('dateNaiss');
        $eleve->email=$eleveRequest->input('email');
        $eleve->classe_id=$eleveRequest->input('classe_id');

        if($eleveRequest -> hasFile('image')){
            $eleveRequest->file("image")->getPathname();
            $imageName=time().'.'.$eleveRequest->image->extension();
            $eleveRequest->image->move(public_path('photos2024_SLAM'), $imageName);
            $eleve->image=$imageName;
        }
        $eleve->save();
        return redirect()->route('eleve.index')->with('info',"L'éléve a bien été créé");
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve) : View
    {
       return view ("show",compact ('eleve')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve) : View
    {
        //
        return view('edit', compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EleveRequest $eleveRequest, Eleve $eleve) : RedirectResponse
    {
        //
        $eleveRequest->file("image")->getPathname();
        $imageName=time().'.'.$eleveRequest->image->extension();
        $eleveRequest->image->move(public_path('photos'), $imageName);
    
        $eleve->nom=$eleveRequest->input('nom');
        $eleve->prenom=$eleveRequest->input('prenom');
        $eleve->dateNaiss=$eleveRequest->input('dateNaiss');
        $eleve->email=$eleveRequest->input('email');
        $eleve->image = $imageName;
        $eleve->save();
    
        return redirect()->route('eleve.index')->with('info',"L'élève a bien été modifié");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve) : RedirectResponse
    {
        $eleve->delete();
        return back()->with('info', "l'élève a été supprimé");
    }

   
}
