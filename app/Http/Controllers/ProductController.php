<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Courrier;
use App\Models\Product;
use App\Models\Annex;
use App\Models\Expiditeur;
use App\Models\Theme;
use App\Models\Type;
// use App\Exports\ProductsExport;
// use Maatwebsite\Excel\Facades\Excel;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
{
    $query = Courrier::query();
    $numBO = $request->input('NumBO');
    $dateBO = $request->input('DateBO');
    $typeExpiditeur = $request->input('typeExpiditeur');
    $annex = $request->input('Annex');
    $objet = $request->input('objet');
    $theme = $request->input('theme');
    $type = $request->input('type');

    $types = Type::all();
    $expiditeurs = Expiditeur::all();
    $themes = Theme::all();
    $annexes = Annex::all();

    if ($numBO) {
        $query->where('NumBO', $numBO);
    }

    if ($dateBO) {
        $query->where('DateBO', $dateBO);
    }
    if ($typeExpiditeur) {
        $query->where('typeExpiditeur', $typeExpiditeur);
    }
    if ($annex) {
        $query->where('Annex', $annex);
    }

    if ($objet) {
        $query->where('objet', $objet);
    }

    if ($theme) {
        $query->where('theme', $theme);
    }

    if ($type) {
        $query->where('type', $type);
    }

    $courrier = $query->get();
    

    return response()->view('products.index', compact('courrier', 'types', 'expiditeurs', 'themes', 'annexes'));
}
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=Type::ALL();
        $expiditeur=Expiditeur::ALL();
        $theme=Theme::ALL();
        $annex=Annex::ALL();
        return view('products.create', compact('type', 'expiditeur', 'theme', 'annex'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'NumBO' => 'required|integer',
            ],[
                'NumBO.integer' => 'le num bo doit etre un number',
            ]
        );
        Courrier::create($request->all());
 
        return redirect()->route('products')->with('success', 'Courrier added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $NDSICG)
    {
        $courrier = Courrier::findOrFail($NDSICG);
        $type=Type::ALL();
        $expiditeur=Expiditeur::ALL();
        $theme=Theme::ALL();
        $annex=Annex::ALL();
  
        return view('products.show', compact('courrier'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NDSICG)
    {
        $type=Type::ALL();
        $expiditeur=Expiditeur::ALL();
        $theme=Theme::ALL();
        $annex=Annex::ALL();
        $courrier = Courrier::findOrFail($NDSICG);
  
        return view('products.edit', compact('courrier','type', 'expiditeur', 'theme', 'annex'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NDSICG)
{
    $courrier = Courrier::findOrFail($NDSICG);
    
    $courrier->NumBO = $request->input('NumBO');
    $courrier->DateBO = $request->input('DateBO');
    $courrier->typeExpiditeur = $request->input('typeExpiditeur');
    $courrier->objet = $request->input('objet');
    $courrier->observation = $request->input('observation');
    $courrier->travailEFF = $request->input('travailEFF');

    if ($request->input('typeExpiditeur') === 'Personne') {
        $courrier->expiditeurPER = $request->input('expiditeurPER');
        $courrier->expiditeurAD = null; 
    } else {
        $courrier->expiditeurAD = $request->input('expiditeurAD');
        $courrier->expiditeurPER = null; 
    }

    if ($request->filled('Annex')) {
        $courrier->Annex = $request->input('Annex');
    }
    if ($request->filled('theme')) {
        $courrier->theme = $request->input('theme');
    }
    if ($request->filled('type')) {
        $courrier->type = $request->input('type');
    }

    $courrier->save();

    return redirect()->route('products')->with('success', 'Courrier updated successfully');
}
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NDSICG)
    {
        $courrier = Courrier::findOrFail($NDSICG);
  
        $courrier->delete();
  
        return redirect()->route('products')->with('success', 'Courrier deleted successfully');
    }
    
}
