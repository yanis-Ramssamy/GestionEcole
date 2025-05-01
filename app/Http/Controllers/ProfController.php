<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Classe, Prof};
use App\Http\Requests\ProfRequest;
use Illuminate\Http\RedirectResponse;



class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Prof $prof)
    {
        $prof->with("classes")->get();
        $profs=Prof::orderBy('nom','asc')->paginate(3);
        return view("professeur", compact("profs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes=Classe::all();
        return view("createProf",compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfRequest $profRequest): RedirectResponse 
    {
        $prof=Prof::create($profRequest->all());
 $prof->classes()->attach($profRequest->clases_id);
 return redirect()->route('professeur.index')->with('info', 'Le prof a bien étét créée');  
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof)
    {
       
            $eleve->delete();
            return back()->with('info', "le prof a bien été supprimé");
        
    
    }
}
