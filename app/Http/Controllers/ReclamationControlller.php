<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Type_anomolie;
use App\models\Reclamation_client;
// use Illuminate\Support\Facades\Mail;

use  App\Mail\DeclarationMail;
use  App\Mail\TestMail;
use Mail;
class ReclamationControlller extends Controller
{
    
    public function index()
    {
        $reclamations = Reclamation_client::latest()->get();
         return view("iks.reclamation.index", compact("reclamations"));
    }

    
    public function create()
    {
        $anomalies = Type_anomolie::all();

        $path = base_path('emails/emails.json');
        $json = file_get_contents($path);
        $emails = json_decode($json, true);
        // $emails = $this->emails2;
         return view("iks.reclamation", compact('anomalies',"emails"));
        
    }
    public function reponse()
    {
        // $reclamation_sans_reponse = Reclamation_client::whereNull("reponse");
        $reclamation_sans_reponse = Reclamation_client::all()->whereNull('reponse');;
         return view("iks.reponse", compact('reclamation_sans_reponse'));
        
    }

    
    public function store(Request $request)
    {
         $request->validate([
            "id_anomalie" => "required",
            "ref" => "required",
            "commentaire" => "required",
            "email" => "required",

        ]);
        // $image = "images/". time() . '.' . $request->file('image')->getClientOriginalExtension();
        // $request->file('image')->move("images/", $image);
        if($request->image)
            {
               
                $image = time() . str_replace(' ', '-', $request->image->getClientOriginalName()) ;

            }

      

        $subject =   Type_anomolie::find($request->id_anomalie)->nom;

        $mailData = [
            'subject'=> $subject,
            'message'=> $request->commentaire,
            "image" => $request->image ?  "images/". $image : NULL
        ];
        if($request->image)
            {
                $request->image->move(public_path("images"), $image);
            }

        // -----------------------------ADD EMAIL FONCTIONALITE
        $to =  $request->email;
        // Mail::to($to)->cc("berbouchi.mohamed@ofppt-edu.ma")->send(new DeclarationMail($mailData));
        $checkedEmails = $request->input('email', []);
        Mail::to($checkedEmails)->send(new DeclarationMail($mailData));
          
        // -----------------------------
   
         
        $reclamation = Reclamation_client::create([
            "id_anomalie" => $request->id_anomalie,
            "ref" =>  $request->ref,
            "commentaire" =>  $request->commentaire,
            "email" =>  json_encode($checkedEmails) ,
             "image" => $request->image ? "images/". $image : NULL
        ]);
     
       

        return redirect()->back()->with("success", "reclamation de client est creer");

    }
  
    
   
    public function ReclamationReponse(Request $request)
    {
        $request->validate([
             "id_reclamation" => "required",
            "reponse" => "required",

        ]);

    

        $reclamation = Reclamation_client::findOrFail($request->id_reclamation);
        $reclamation->reponse = $request->reponse;
        $reclamation->save();
        return redirect()->back()->with("success", "reponse de reclamation est effectué");
    }
    public function destroy(string $id)
    {
        $defaut =  Reclamation_client::findOrFail($id);
        $defaut->delete();
        return redirect()->back()->with("success", "reclamation  est supprimer");

    }
    public function edit(string $id)
    {
        $reclamation =  Reclamation_client::findOrFail($id);
        $anomalies = Type_anomolie::all();
         return view("iks.reclamation.edit", compact("reclamation","anomalies"));
        
    }
    public function show(string $id)
    {
        $reclamation =  Reclamation_client::findOrFail($id);
      
         return view("iks.reclamation.show", compact("reclamation"));
        
    }

  
    public function update(Request $request, string $id)
    {
        $request->validate([
            "id_anomalie" => "required",
            "ref" => "required",
            "commentaire" => "required",
 
        ]);

        $reclamation =  Reclamation_client::findOrFail($id);
       
        $reclamation->id_anomalie = $request->id_anomalie;
        $reclamation->ref = $request->ref;
        $reclamation->commentaire = $request->commentaire;
         $reclamation->save();


        return redirect()->back()->with("success", "reclamation est modifier");
    }
}
