<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function loginUtilisateur(Request $request)
    {
         
        $request->validate([
            
            "matricule" => "required",
            "password" => "required"
        ]
        );
        $utilisateur = Utilisateur::where("matricule", "=",$request->matricule)->first();
        if($utilisateur){
            if($utilisateur->password != $request->password)
            {
                // use Hash
                // Hash::check($request->password, $utilisateur->password)

              return redirect()->back()->with("fail", "mot de pass incorrect");
                
            }
            $request->session()->put("utilisateur", $utilisateur);
            if ($utilisateur->role == "admin")
            {

                return redirect()->route('home');
            }
            return redirect()->route('defaut.create');
        }else{
              return redirect()->back()->with("fail", "error dans votre matricule ");
         }

    }

    public function dashboard()
    {
        if (Session::has('utilisateur')){
            $data = Utilisateur::where("matricule", "=",Session::get('utilisateur')->matricule)->first();
            return view("dashboard", compact("data"));
        }
    }
    public function home()
    {
        if (Session::has('utilisateur')){
            $data = Utilisateur::where("matricule", "=",Session::get('utilisateur')->matricule)->first();
            return view("home", compact("data"));
        }
    }

    public function logout()
    {
        // signout
        Session::pull('utilisateur');

        return redirect('login');
    }


   
}
