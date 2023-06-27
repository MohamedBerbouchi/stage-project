<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Create_defautControlller;
use App\Http\Controllers\ReclamationControlller;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\ExcelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/test', function(){
//     return view("main");
// });
// route::get("/",[LoginController::class, 'home'])->name('home')->middleware('IsLoggedIn');
 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(["alreadyLoggedIn"]);
Route::post('/loginUtilisateur', [LoginController::class,  'loginUtilisateur'])->name('loginUtilisateur');
// Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware(["IsLoggedIn", 'IsAdmin']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// route::get("/home",[LoginController::class, 'home'])->name('home')->middleware('IsLoggedIn');



Route::middleware(["IsLoggedIn"])->group(function(){
    // route for default

    Route::get('/defauts/create', [Create_defautControlller::class, "create"])->name("defaut.create");
    Route::get('/defauts', [Create_defautControlller::class, "index"])->name("defaut.index"); 
    Route::get('/defauts/edit/{id}', [Create_defautControlller::class, "edit"])->name("defaut.edit"); 
    Route::post('/defauts/update/{id}', [Create_defautControlller::class, "update"])->name("defaut.update"); 
    // Route::get('/create_defaut', [Create_defautControlller::class, "create"])->name("defaut.create");
    Route::post('/defauts/store', [Create_defautControlller::class, "store"])->name("defaut.store");


 
});

Route::middleware(["IsAdmin"])->group(function(){
    //route for  statistique
    Route::get('/', [StatistiqueController::class, "index"])->name("home");
    Route::get('/home', [StatistiqueController::class, "index"])->name("home");

    // route for defaut 
    Route::post('/defauts/delete/{id}', [Create_defautControlller::class, "destroy"])->name("defaut.delete");

    // route for reclamation
    Route::get('/reclamation/create', [ReclamationControlller::class, "create"])->name("reclamation.create");
    Route::post('/reclamation/store', [ReclamationControlller::class, "store"])->name("reclamation.store");
    Route::get('/reponse/create', [ReclamationControlller::class, "reponse"])->name("reclamation.reponse");
    Route::post('/ReclamationReponse', [ReclamationControlller::class, "ReclamationReponse"])->name("ReclamationReponse");
 

    Route::get('/reclamation', [ReclamationControlller::class, "index"])->name("reclamation.index");
    Route::get('/reclamation/show/{id}', [ReclamationControlller::class, "show"])->name("reclamation.show");
 
    // Route::get('/reclamation/show', [ReclamationControlller::class, "show"]);
    Route::get('/reclamation/edit/{id}', [ReclamationControlller::class, "edit"])->name("reclamation.edit");
    Route::post('/reclamation/update/{id}', [ReclamationControlller::class, "update"])->name("reclamation.update");
    Route::post('/reclamation/delete/{id}', [ReclamationControlller::class, "destroy"])->name("reclamation.delete");

    // create gestion controller
 
      Route::get("/gestion", [GestionController::class, "index"])->name("gestion");
    //   Route::get("/gestion/import/utilisateur", [GestionController::class, "import"])->name("utilisateur.import");
    //   Route::get("/gestion/export/utilisateur", [GestionController::class, "export"])->name("utilisateur.export");

      Route::post("/upload-user", [GestionController::class, "uploadUser"])->name("uploadUser");
      Route::post("/upload-defaut", [GestionController::class, "uploadDefaut"])->name("uploadDefaut");
      Route::post("/upload-anomalie", [GestionController::class, "uploadAnomalie"])->name("uploadAnomalie");


});


// create gestion controller
// _______________________
// Route::get("/gestion", [GestionController::class, "index"]);
// Route::post("/gestion/import/utilisatuer", [GestionController::class, "index"]);
// Route::post("/gestion/import/defaut", [GestionController::class, "index"]);
// Route::post("/gestion/import/anamolie", [GestionController::class, "index"]);