<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\RegisteredUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/employees', [MainController::class, 'getAllEmployee'])->middleware(['auth'])->name('employees');

Route::get('/employees/createNew', [MainController::class, 'create'])->middleware(['auth'])->name('createNewEmployee');

Route::get('/employeeView/{id}', [MainController::class, 'EmployeeView'])->middleware(['auth'])->name('employeeView');

Route::get('/employeeEdit/{id}', [MainController::class, 'EmployeeEdit'])->middleware(['auth'])->name('employeeEdit');

Route::get('/employeeUpdate', [MainController::class, 'EmployeeUpdate'])->middleware(['auth'])->name('employeeUpdate');

Route::get('/manage-stock-category', [MainController::class, 'AllStockCategory'])->middleware(['auth'])->name('manage-stock-category');

Route::get('/manage-stock-category/createNew', [MainController::class, 'createCategory'])->middleware(['auth'])->name('createStockCategory');

Route::get('/delete-stock-category', [MainController::class, 'deleteStockCategory'])->middleware(['auth'])->name('delete-stock-category');

Route::get('/edit-stock-category', [MainController::class, 'editStockCategory'])->middleware(['auth'])->name('edit-stock-category');


Route::get('/stock', function () {
    return view('stock');
})->middleware(['auth'])->name('stock');

/*Route::get('/manage-stock-category', function () {
    return view('categoryStock');
})->middleware(['auth'])->name('manage-stock-category');*/




Route::get('/orders', function () {
    return view('orders');
})->middleware(['auth'])->name('orders');

Route::get('/roles', function () {
    return view('roles');
})->middleware(['auth'])->name('roles');

require __DIR__.'/auth.php';
