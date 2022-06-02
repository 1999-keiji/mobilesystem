<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stock;
use App\Models\Sale;
use App\Models\Inventory;
use App\Models\Pay;

class SaleController extends Controller
{
  public function index(){
    $sales = Sale::all()->sortByDesc('created_at');
    // dd($sales);
    return view('sales.index',compact('sales'));
  }
  public function today(){
    $sales = Sale::all()->sortByDesc('created_at');
    return view('sales.today', compact('sales'));
  }
  public function sell(){
    $stocks = Stock::join('inventories', 'inventories.id','=','stocks.inventory_id')
    ->whereNotIn('quantity',[0])
    ->whereNotIn('category_id',[1])
    ->get();
    // dd($stocks);
    $customers = Customer::all();
    return view('sales.sell',compact('stocks','customers'));
  }
  public function show($id){
    $sale = Sale::FindOrFail($id);
    // dd($sale);
    return view('sales.show',compact('sale'));
  }
  public function create(Request $request){
    $inputs = $request->all();
    // dd($inputs);
      $request->validate([
        'sales-date'=>'required',
        'register'=>'required',
        // 'sales_category_id'=>'required',
        'stock_id'=>'nullable',
        'price'=>'required',
      ],[],[
        'sales-date'=>'販売日',
        'register'=>'販売登録者',
        // 'sales_category_id'=>'販売品目',
        'stock_id'=>'商品名',
        'price'=>'販売価格(税込)',
      ]);
    $customer = Customer::where('name', $inputs['customer'])
    ->first();
    // 来客登録
    if(!isset($customer) && isset($input['customer'])){
      $customer = Customer::create([
        'status' => 1,
        'name'=> $inputs['customer'],
        'updated_at' => date('Y/m/d H:i:s')
      ]);
    }else{
      $customer=null;
    }
    // 在庫処理
    if(isset($inputs['stock_id'])){
      $stock = Stock::where('id',$inputs['stock_id'])->first();
      if(isset($stock)){
        $inventory = Inventory::where('id',$stock['inventory_id'])->first();
        Inventory::where('id',$stock['inventory_id'])
        ->update([
          'quantity' => $inventory['quantity']-1,
          'consumption' => $inventory['consumption']+1,
          'updated_at' => date('Y/m/d H:i:s')
        ]);
      }
    }
    Sale::create([
      'status' => 1,
      'user_id' => \Auth::user()->id,
      'customer_id' => $customer['id'],
      'register' => $inputs['register'],
      'editer' => $inputs['register'],
      'sales-date' => $inputs['sales-date'],
      'stock_id' => $inputs['stock_id'],
      'price' => $inputs['price'],
      'pay_id' => $inputs['pay'],
      'remarks' => $inputs['remarks'],
      'created_at' => date('Y/m/d H:i:s'),
      'updated_at' => date('Y/m/d H:i:s')
    ]);
    return redirect()->route('sale.today');
  }
}
