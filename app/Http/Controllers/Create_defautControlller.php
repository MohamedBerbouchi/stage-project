<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_defaut;
use App\Models\Saisir_defaut;
 
// use Auth;
use Session;

class Create_defautControlller extends Controller
{
  
    public function index()
    {

        if(Session::get('utilisateur')->role == "admin")
            $defauts = Saisir_defaut::latest()->get();
        else
            $defauts = Saisir_defaut::where("id_utilisateur" ,"=", Session::get('utilisateur')->id)->latest()->get();
         return view("iks.defaut.index", compact("defauts"));
    }

    
    public function create()    
    {
        $defauts = Type_defaut::all();
         return view("iks.create", compact("defauts"));
    }

    
    public function store(Request $request)
    {
        // dd($request);
        // dd(Auth::user()->name);
        $this->validate($request, 
        [
            "operatrice" => "required",
             "of"  => "required",
              "N_programme"  => "required",
               "id_defaut"  => "required",
               "quantite"  => "required|numeric|min:1"
        
        ]);
        // ["operatrice", "of", "N_programme", "id_defaut", "id_utilisateur"];

        $saisir_defaut = Saisir_defaut::create([
            "operatrice" => $request->operatrice,
             "of"  => $request->of,
              "N_programme"  => $request->N_programme,
               "id_defaut"  => $request->id_defaut,
               "quantite"  => $request->quantite,
                "id_utilisateur" =>Session::get('utilisateur')->id
            ]);
            
         return redirect()->back()->with("success", "defaut de confection est siasir");
    }
 
    public function show(string $id)
    {
        //
    }

    /**
     * gbao  gpao
     */
    public function edit(string $id)
    {
        $defaut =  Saisir_defaut::findOrFail($id);
        $type_defauts = Type_defaut::all();
        if(Session::get('utilisateur')->role != "admin" && $defaut->id_utilisateur != Session::get('utilisateur')->id)
              return redirect()->back();

         return view("iks.defaut.edit", compact("defaut","type_defauts"));
        
    }

    
    public function update(Request $request, string $id)
    {
        $this->validate($request, 
        [
            "operatrice" => "required",
             "of"  => "required",
              "N_programme"  => "required",
               "id_defaut"  => "required",
               "quantite"  => "required|numeric"
        
        ]);
        $defaut =  Saisir_defaut::findOrFail($id);
        if(Session::get('utilisateur')->role != "admin" && $defaut->id_utilisateur != Session::get('utilisateur')->id)
              return redirect()->back();
       
        $defaut->of = $request->of;
        $defaut->N_programme = $request->N_programme;
        $defaut->quantite = $request->quantite;
        $defaut->id_defaut = $request->id_defaut;
        $defaut->operatrice = $request->operatrice;
        $defaut->save();


        return redirect()->back()->with("success", "defaut de confection est modifier");
    }

  
    public function destroy(string $id)
    {
        $defaut =  Saisir_defaut::findOrFail($id);
        $defaut->delete();
        return redirect()->back()->with("success", "defaut de confection est supprimer");

    }
}
