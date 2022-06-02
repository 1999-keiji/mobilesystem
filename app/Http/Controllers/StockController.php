<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Type;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Device;
use App\Models\Inventory;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class StockController extends Controller
{
  public function index(){
    $stocks = Stock::join('inventories', 'inventories.id','=','stocks.inventory_id')
    ->whereNotIn('quantity',[0])
    ->orderBy('supply-date')
    ->get();
    // dd($stocks);
    return view('stocks.index',compact('stocks'));
  }
  public function parts(){
    $stocks = Stock::where('category_id',1)->get();
    return view('stocks.parts',compact('stocks'));
  }
  public function phone(){
    $stocks = Stock::where('category_id',2)->get();
    return view('stocks.phone',compact('stocks'));
  }
  public function other(){
    $stocks = Stock::whereNotIn('category_id',[1,2])->get();
    return view('stocks.other',compact('stocks'));
  }
  public function show($id){
    $stock = Stock::FindOrFail($id);
    return view('stocks.show',compact('stock'));
  }
  public function supply_parts(){
    $devices = Device::all();
    $makers = Maker::all();
    return view('supplies.parts',compact('devices','makers'));
  }
  public function supply_phone(){
    $devices = Device::all();
    $makers = Maker::all();
    return view('supplies.phone',compact('devices','makers'));
  }
  public function supply_other(){
    $devices = Device::all();
    $makers = Maker::all();
    return view('supplies.other',compact('devices','makers'));
  }
  public function create(Request $request){
    $inputs = $request->all();
    // dd($inputs);
    if($inputs['category']=="1"){
      // dd($inputs);
      $request->validate([
        'supply-date' => 'required',
        'register' => 'required|alpha_num',
        'supplier' => 'required',
        'supply-stock' => 'required|alpha_num',
        'supply-price' => 'required|alpha_num', 
        'name' => 'required',
        'minimum-stock' => 'integer|nullable'
      ],[],[
        'supply-date' => '仕入れ日',
        'register' => '登録担当者', 
        'supplier' => '仕入れ業者,場所',
        'supply-stock' => '仕入れ個数',
        'supply-price' => '仕入れ価格(税込)',
        'name' => '商品内容',
        'minimum-stock' => '最低在庫数'
      ]);
    }elseif($inputs['category'] == "2"){
      // dd($inputs);
      $inputs['supply-stock'] = 1;
      $request->validate([
        'supply-date' => 'required',
        'register' => 'required|alpha_num',
        'customer' => 'required',
        'type' => 'required',
        'rank' => 'nullable',
        'supply-price' => 'required',
      ],[],[
        'supply-date' => '買取日',
        'register' => '登録担当者', 
        'customer' => '来客名',
        'type' => '機種名',
        'rank' => '商品ランク',
        'supply-price' => '仕入れ価格(税込)',
      ]);
    }else{
      // dd($inputs);
      $request->validate([
        'supply-date' => 'required',
        // 'supplier' => 'required',
        'supply-stock' => 'required',
        'supply-price' => 'required',
        'register' => 'required|alpha_num',
        'name' => 'required'
      ],[],[
        'supply-date' => '仕入れ日',
        'supplier' => '仕入れ業者,場所',
        'supply-stock' => '仕入れ個数',
        'supply-price' => '仕入れ価格(税込)',
        'register' => '登録担当者', 
        'name' => '商品内容'
      ]);
    }
    // dd($inputs);
    // $category=Category::updateOrCreate(
    //   ['name'=>$inputs['category']],
    //   ['name'=>$inputs['category']]
    // );
    // if(isset($inputs['maker']) && !empty($inputs['maker'])){
    //   $maker=Maker::updateOrCreate(
    //     ['name'=>$inputs['maker']],
    //     ['name'=>$inputs['maker']]
    //   );
    // }else{$maker=null;}

    // if(isset($inputs['type']) && !empty($inputs['type'])){
    //   $type=Type::updateOrCreate(
    //     ['name'=>$inputs['type']],
    //     ['name'=>$inputs['type']]
    //   );
    // }else{$type=null;
    // }
    
    if(isset($inputs['supplier']) && !empty($inputs['supplier'])){
      $supplier=Supplier::updateOrCreate(
        ['name'=>$inputs['supplier']],
        ['name'=>$inputs['supplier']]
      );
    }else{$supplier=null;}
    if(isset($inputs['customer']) && !empty($inputs['customer'])){
      $customer=Customer::updateOrCreate(
        ['name'=>$inputs['customer']],
        ['status'=>1,'name'=>$inputs['customer']]
      );
    }else{$customer=null;}
    $inventory = Inventory::create([
      'quantity' => $inputs['supply-stock']
    ]);
    Stock::create([
      'status' => 1,
      'user_id' => \Auth::user()->id,
      'register'=> $inputs['register'],
      'editer'=> $inputs['register'],
      'category_id' => $inputs['category'],
      'device_id' => $inputs['device_id'],
      'color' => $inputs['color'],
      'name' => $inputs['name'],
      'serial-number' => $inputs['serial-number'],
      'rank' => $inputs['rank'],
      'customer_id' => $customer['id'],
      'supplier_id' => $supplier['id'],
      'supply-stock' => $inputs['supply-stock'],
      'inventory_id' => $inventory['id'],
      'supply-date' => $inputs['supply-date'],
      'supply-price' => $inputs['supply-price'],
      'minimum-stock' => $inputs['minimum-stock'],
      'remarks' => $inputs['remarks'],
    ]);
    return redirect()->route('stock.index', compact('inputs'));
  }
}
