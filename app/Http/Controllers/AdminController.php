<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Courrier;
use App\Models\Product;
use App\Models\Annex;
use App\Models\Expiditeur;
use App\Models\Theme;
use App\Models\Type;
use App\Models\User;
// use App\Exports\ProductsExport;
// use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    
    $var=$request->input('var');
        if($var==='typeEX'){
            $typeEX = Expiditeur::all();
            return view('admin.expiditeur',compact('typeEX'));
        }
        elseif($var==='annex'){
            $annex = Annex::all();
            return view('admin.annex',compact('annex'));
        }
        elseif($var==='theme'){
            $theme = Theme::all();
            return view('admin.theme',compact('theme'));        }
        elseif($var==='type'){
            $type = Type::all();
            return view('admin.type',compact('type'));
        }
        else
        {
        $user = User::all();
        return response()->view('admin.indexAD', compact('user'));
        }
    
}
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $var=$request->input('var');
        if($var==='typeEX'){
            return view('admin.expiditeurAD');
        }
        elseif($var==='annex'){
            return view('admin.annexAD');
        }
        elseif($var==='theme'){
            return view('admin.themeAD');
        }
        elseif($var==='type'){
            return view('admin.typeAD');
        }
        else
        {
            return view('admin.createAD');
        }
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $var=$request->input('var');
        if($var==='user'){
        
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'typeExpiditeur' => 'required', // You might need to adjust this rule
                'password' => 'required', // You might need to adjust this rule
            ]);
        
            try {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'typeUser' => $request->typeExpiditeur,
                    'password' => Hash::make($request->password),
                    // 'typeUser' => 'Admin'
                ]);
        
                return redirect()->route('admin.index')->with('success', 'Utilisateur ajouté avec succès');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->errorInfo[1] == 1062) { 
                    return redirect()->back()->withInput()->withErrors(['error' => 'The name has already been taken.']);
                } else {
                    return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur s\'est produite lors du traitement de votre demande. Veuillez réessayer plus tard.']);
                }
            }
        }
        elseif($var==='annex'){
            Annex::create($request->all());
            return redirect()->route('admin.index',['var' => 'annex'])->with('success', 'Annex added successfully');
        }
        elseif($var==='theme'){
            Theme::create($request->all());
            return redirect()->route('admin.index',['var' => 'theme'])->with('success', 'Theme added successfully');
        }
        elseif($var==='type'){
            Type::create($request->all());
            return redirect()->route('admin.index',['var' => 'type'])->with('success', 'Type added successfully');
        }
        else
        {
            Expiditeur::create($request->all());
            return redirect()->route('admin.index',['var' => 'typeEX'])->with('success', 'Expiditeur added successfully');
        }
    
    
}
    /**
     * Display the specified resource.
     */
    public function show(string $NDSICG)
    {
        // $courrier = Courrier::findOrFail($NDSICG);
        // $type=Type::ALL();
        // $expiditeur=Expiditeur::ALL();
        // $theme=Theme::ALL();
        // $annex=Annex::ALL();
  
        // return view('products.show', compact('courrier'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $var,string $id)
    {
        
     
        
        

        // $var=$request->input('var');
        if($var==='typeEX'){
            $expiditeur=Expiditeur::findOrFail($id);
            return view('admin.expiditeurAD',compact('expiditeur'));
        }
        elseif($var==='annex'){
            $annex=Annex::findOrFail($id);
            return view('admin.annexAD',compact('annex'));
        }   
        elseif($var==='theme'){
            $theme=Theme::findOrFail($id);
            return view('admin.themeAD',compact('theme'));
        }
        elseif($var==='user'){
            $user=User::findOrFail($id);
            return view('admin.createAD',compact('user'));
        }
        else
        {
            $type=Type::findOrFail($id);
            return view('admin.typeAD',compact('type'));
        }
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $var, string $id)
{
    if($var==='typeEX'){
        $typeEX = Expiditeur::findOrFail($id);
        $typeEX->typeEX = $request->input('typeEX');
        $typeEX->save();
        return redirect()->route('admin.index',['var'=>'typeEX'])->with('success', 'Expiditeur updated successfully');
    }
    elseif($var==='annex'){
        $annex = Annex::findOrFail($id);
        $annex->annex = $request->input('annex');
        $annex->save();
        return redirect()->route('admin.index',['var'=>'annex'])->with('success', 'Annex updated successfully');
    }
    elseif($var==='theme'){
        $theme = Theme::findOrFail($id);
        $theme->theme = $request->input('theme');
        $theme->save();
        return redirect()->route('admin.index',['var'=>'theme'])->with('success', 'Theme updated successfully');
    }
    elseif($var==='user'){
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->typeUser = $request->input('typeExpiditeur');
        $user->save();
        return redirect()->route('admin.index',['var'=>'user'])->with('success', 'User updated successfully');
    }
    else{
        $type = Type::findOrFail($id);
        $type->type = $request->input('type');
        $type->save();
        return redirect()->route('admin.index',['var'=>'type'])->with('success', 'Type updated successfully');
    }
    
}
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $var, string $id,string $nam)
{
    $entity = null;
    $courrierReferences = Courrier::where('annex', $nam)
                                   ->orWhere('expiditeurAD', $nam)
                                   ->orWhere('type', $nam)
                                   ->orWhere('theme', $nam)
                                   ->exists();

    if ($courrierReferences) {
        return redirect()->route('admin.index', ['var' => $var])->withErrors(['error' => 'Cannot delete ' . ucfirst($var) . ' as it is associated with one or more courriers.']);
    }
    else {
        switch ($var) {
            case 'typeEX':
                $entity = Expiditeur::findOrFail($id);
                break;
            case 'annex':
                $entity = Annex::findOrFail($id);
                break;
            case 'theme':
                $entity = Theme::findOrFail($id);
                break;
            case 'type':
                $entity = Type::findOrFail($id);
                break;
            default:
                $entity = User::findOrFail($id);
                break;
        }
    
        $entity->delete();
    
        return redirect()->route('admin.index', ['var' => $var])->with('success', ucfirst($var) . ' deleted successfully');
    }
    
}


   

    
}
