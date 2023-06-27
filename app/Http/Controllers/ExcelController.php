<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{
    

    public function uploadUser(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
    
        $path = $request->file('file')->getRealPath();
        Excel::import(new UsersImport,$path);

        return redirect()->back()->with('success', 'User Imported Successfully');
    }
}
