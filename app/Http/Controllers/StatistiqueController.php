<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saisir_defaut;
use App\models\Reclamation_client;
use App\models\Utilisateur;
use Carbon\Carbon;
use DB;
class StatistiqueController extends Controller
{
    public function index()
    {
        $nb_defauts = Saisir_defaut::all()->count();
        $nb_reclamations = Reclamation_client::all()->count();
        $nb_reclamations_reponde = Reclamation_client::whereNotNull('reponse')->count();
        $nb_reclamations_pas_reponde = Reclamation_client::whereNull('reponse')->count();
        $nb_utilisateur = Utilisateur::where("role","<>", "admin")->count();
        // $nb_utilisateur_avoir_defaut = Utilisateur::where("role","<>", "admin")->count();
        // $ddd = Saisir_defaut::distinct()->count('id_utilisateur');
        $statistics = [
             "nb_defauts" => $nb_defauts,
             "nb_reclamations" =>  $nb_reclamations,
              "nb_reclamations_reponde" => $nb_reclamations_reponde,
              "nb_reclamations_pas_reponde" => $nb_reclamations_pas_reponde,
              "reclamation_p" => $nb_reclamations ? round($nb_reclamations_reponde *  100 / $nb_reclamations ,2): 0,
        ];
        $data = Saisir_defaut::select('id', "created_at")->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('M');
        });
        // dd($data);
        
        $months = ['Jan' => 0, 'Feb'=> 0, 'Mar'=> 0, 'Apr'=> 0, 'May'=> 0, 'Jun'=> 0, "Jul"=> 0, "Aug"=> 0, "Sep"=> 0, "Oct"=> 0, "Nov"=> 0, "Dec"=> 0];
        $c = 0;
        
        foreach($data as $month => $value){
            
                $months[$month] = count($value);
              
        }
        // dd($data);
        // dd( array_values($months));
        $months = array_values($months);
     
        $list_operatrice = DB::select('select operatrice, count(*) as count from saisir_defaut where year(`created_at`) = ? and month(`created_at`) = ? group by operatrice order by count desc', [date("Y"), date("m")]);
      
    
        $data = Saisir_defaut::where("created_at")->get();
        return view('home', compact("statistics", "months","list_operatrice"));
    }
}
