<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\AnomaliesImport;
use App\Imports\DefautsImport;

class GestionController extends Controller
{
    public function index()
    {
        return view('iks.gestion.index');
    }


    public function uploadUser(Request $request)
    {
        $request->validate([
            "users" => "required|mimes:xlsx,xls"
        ]);
        $file = request()->file("users");

       
        // dd($file);
        Excel::queueImport(new UsersImport(), $file);
        
        return redirect()->back()->with('success', 'User Imported Successfully');
    }

    public function uploadDefaut(Request $request)
    {
        $request->validate([
            "defauts" => "required|mimes:xlsx,xls"
        ]);
        $file = request()->file("defauts");

        // dd($file);
        Excel::queueImport(new DefautsImport(), $file);
        return redirect()->back()->with('success', 'defauts Imported Successfully');
    }


    public function uploadAnomalie(Request $request)
    {
        $request->validate([
            "anomalies" => "required|mimes:xlsx,xls"
        ]);
        $file = request()->file("anomalies");

        // dd($file);
        Excel::queueImport(new AnomaliesImport(), $file);
        return redirect()->back()->with('success', 'anomalies Imported Successfully');
    }
}
