<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;

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

Route::get('print', function () {
    return view('print');
})->name('printer');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('items/{item}/print', [ItemController::class,'print'])->name('print');
        Route::resource('issues', IssueController::class);
        Route::post('issues/items', [IssueController::class,'issue_items'])->name('issues.items');
        Route::resource('items', ItemController::class);
        Route::resource('offices', OfficeController::class);
        Route::resource('users', UserController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('orders', OrderController::class);
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
        Route::get('reports/invoices', [ReportController::class, 'invoices'])->name('reports.invoices');
        Route::get('reports/issues', [ReportController::class, 'issues'])->name('reports.issues');
        Route::get('reports/orders', [ReportController::class, 'orders'])->name('reports.orders');
    });
