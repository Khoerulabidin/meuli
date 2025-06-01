<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeMstrController;
use App\Http\Controllers\BranchMstrController;
use App\Http\Controllers\TrHistController;
use App\Http\Controllers\CoMstrController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableMstrController;
use App\Http\Controllers\CostHistController;
use App\Http\Controllers\ItemMstrController;
use App\Http\Controllers\PriceDetController;
use App\Http\Controllers\PriceMstrController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CoMstrController::class, 'index']);
Route::post('/CoMstr', [CoMstrController::class, 'store'])->name('CoMstr.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // code master
    Route::resource('CodeMstrs', CodeMstrController::class);
    Route::get('CodeMstrList', [CodeMstrController::class, 'index'])->name('CodeMstrList');

    Route::get('CodeMstr/{codemasterId}/delete', [App\Http\Controllers\CodeMstrController::class, 'destroy']);


    // item Master
    Route::resource('ItemMstrs', ItemMstrController::class);
    Route::get('ItemMstrList', [ItemMstrController::class, 'index'])->name('ItemMstrList');
    Route::get('ItemMstr/{itemmstrid}/delete', [ItemMstrController::class, 'destroy']);

    //price master
    Route::resource('PriceMstrs', PriceMstrController::class);
    Route::get('PriceMstrList', [PriceMstrController::class, 'index'])->name('PriceMstrList');
    Route::get('PriceMstr/{PriceMstrid}/delete', [PriceMstrController::class, 'destroy']);
    Route::get('PriceMstr/{PriceMstrid}/show', [PriceMstrController::class, 'show']);

    //price detail
    Route::resource('PriceDets', PriceDetController::class);
    Route::get('PriceDetList', [PriceDetController::class, 'index'])->name('PriceDetList');
    Route::get('PriceDet/{PriceDetid}/delete', [PriceDetController::class, 'destroy']);

    //price master
    Route::resource('CostHists', CostHistController::class);
    Route::get('CostHistList', [CostHistController::class, 'index'])->name('CostHistList');
    Route::get('CostHist/{CostHistid}/delete', [CostHistController::class, 'destroy']);

    // Branch Master
    Route::resource('BranchMstrs', BranchMstrController::class);

    // Tr Hist
    Route::resource('TrHists', TrHistController::class);

    Route::get('CodeMstr/{codemasterId}/delete', [CodeMstrController::class, 'destroy']);

    // table master
    Route::resource('TableMstrs', TableMstrController::class);
    Route::get('TableMstrList', [TableMstrController::class, 'index'])->name('TableMstrList');
    Route::get('TableMstr/{codemasterId}/delete', [TableMstrController::class, 'destroy']);
});


Route::middleware('auth')->group(function () {});



require __DIR__ . '/auth.php';
