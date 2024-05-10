<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\MedicineController;

Route::get('medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('medicines', [MedicineController::class, 'store'])->name('medicines.store');

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

Route::get('/', function () {
    return view('welcome');
});
