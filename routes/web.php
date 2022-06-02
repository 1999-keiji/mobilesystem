<?php

use Illuminate\Support\Facades\Route;

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
// test
Route::get('/test',function(){
  return view('test');
});
Route::post('/test/create', 'App\Http\Controllers\HomeController@test_create')->name('test.create');
// test
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
  Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/supply/parts', [App\Http\Controllers\StockController::class, 'supply_parts'])->name('supply.parts');
  Route::get('/supply/phone', [App\Http\Controllers\StockController::class, 'supply_phone'])->name('supply.phone');
  Route::get('/supply/other', [App\Http\Controllers\StockController::class, 'supply_other'])->name('supply.other');
  Route::post('/supply/create', [App\Http\Controllers\StockController::class, 'create'])->name('supply.create');
  Route::post('/supply/update', [App\Http\Controllers\StockController::class, 'update'])->name('supply.update');
  Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock.index');
  Route::get('/stock/parts', [App\Http\Controllers\StockController::class, 'parts'])->name('stock.parts');
  Route::get('/stock/phone', [App\Http\Controllers\StockController::class, 'phone'])->name('stock.phone');
  Route::get('/stock/other', [App\Http\Controllers\StockController::class, 'other'])->name('stock.other');
  Route::get('/stock/{id}', [App\Http\Controllers\StockController::class, 'show'])->name('stock.show');
  Route::get('/fix', [App\Http\Controllers\FixController::class, 'index'])->name('fix.index');
  Route::get('/fix/new', [App\Http\Controllers\FixController::class, 'new'])->name('fix.new');
  Route::post('/fix/create', [App\Http\Controllers\FixController::class, 'create'])->name('fix.create');
  Route::get('/fix/{id}', [App\Http\Controllers\FixController::class, 'show'])->name('fix.show');
  // Route::get('/fix/new', [App\Http\Controllers\FixController::class, 'new'])->name('fix.new');
  // Route::get('/fix/{id}/edit', [App\Http\Controllers\FixController::class, 'edit'])->name('fix.edit');
  Route::get('/sale', [App\Http\Controllers\SaleController::class, 'index'])->name('sale.index');
  Route::get('/', [App\Http\Controllers\SaleController::class, 'today'])->name('sale.today');
  Route::get('/sell', [App\Http\Controllers\SaleController::class, 'sell'])->name('sale.sell');
  Route::get('/sale/{id}', [App\Http\Controllers\SaleController::class, 'show'])->name('sale.show');
  Route::post('/sale/create', [App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');
  Route::get('/contract', [App\Http\Controllers\ContractController::class, 'index'])->name('contract.index');
  Route::get('/contract/new', [App\Http\Controllers\ContractController::class, 'new'])->name('contract.new');
  Route::post('/contract/create', [App\Http\Controllers\ContractController::class, 'create'])->name('contract.create');
  Route::get('/contract/{id}', [App\Http\Controllers\ContractController::class, 'show'])->name('contract.show');
  Route::get('/contract/{id}/renew', [App\Http\Controllers\ContractController::class, 'renew'])->name('contract.renew');
  Route::post('/contract/{id}/update', [App\Http\Controllers\ContractController::class, 'update'])->name('contract.update');
  Route::get('/shop',function(){
    return view('shops.index');
  });
  Route::get('/proceeds',function(){
    return view('proceeds.index');
  });
});
