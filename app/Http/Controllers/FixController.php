<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\FixDetail;
use App\Models\Fix;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\Maker;
use App\Models\Reception;
use App\Models\Stock;
use App\Models\Customer;
use Illuminate\Http\Request;

class FixController extends Controller
{
    //
    public function index(){
      return view('fixes.index');
    }
    public function new(){
      $receptions = Reception::all();
      $makers = Maker::all();
      $devices = Device::all();
      $fix_details = FixDetail::all();
      $parts = Stock::where(function($query){
        $query->orWhere('category_id',1)
              ->orWhere('category_id',6)
              ->orWhere('category_id',7);
      })
      ->join('devices', 'devices.id','=','stocks.device_id')
      ->join('inventories', 'inventories.id','=','stocks.inventory_id')
      ->select('stocks.id','supply-date','device-name','stocks.name','inventories.quantity')
      ->where('quantity','!=',0)
      ->get();
      // dd($parts);
      return view('fixes.new',compact('parts', 'fix_details', 'receptions', 'makers', 'devices'));
    }
    public function create(Request $request){
      $inputs = $request->all();
      // dd($inputs);
      // $request->validate([
      //   'fix-date'=>'required',
      //   'customer-name'=>'required',
      //   'reception-style'=>'required',
      //   'reception-user'=>'required',
      //   'reception'=>'required',
      //   'fix-user'=>'required',
      //   'fix-details'=>'required',
      // ],[],[
      //   'fix-date'=>'修理日',
      //   'customer-name'=>'来客名',
      //   'reception-style'=>'来店きっかけ',
      //   'reception-user'=>'受付担当',
      //   'reception'=>'受付内容',
      //   'fix-user'=>'修理担当',
      //   'fix-details'=>'修理内容',
      // ]);
      // $customer = Customer::create([
      //   'name'=>$inputs['customer-name'],
      //   'age'=>$inputs['years'],
      //   'sex'=>$inputs['sex'],
      //   'status'=>1
      // ]);
      // $reception_array = implode(",", $inputs['reception']);
      // $fix_details_array = implode(",", $inputs['fix-details']);
      $stock_array = implode(",", $inputs['stock']);
      // $fix = Fix::create([
      //   'status'=>1,
      //   'account'=> \Auth::user()->id,
      //   'user_id'=> $inputs['fix-user'],
      //   'create-user' => $inputs['fix-user'],
      //   'fix-date' => $inputs['fix-date'],
      //   'customer_id' => $customer->id,
      //   'trigger' => $inputs['reception-style'],
      //   'device_id' => $inputs['device_id'],
      //   // 'color' => $inputs['color'],
      //   'serial-number' => $inputs['serial-num'],
      //   'fix-date' => $inputs['fix-date'],
      //   'reception' => $reception_array,
      //   'fix-details' => $fix_details_array,
      //   'stock' => $stock_array,
      //   'reception-user' => $inputs['reception-user'],
      //   'fix-user' => $inputs['fix-user'],
      // ]);
      // $sale = Sale::create([
      //   'status' => 1,
      //   'category_id' => 1,
      //   'user_id' => $inputs['fix-user'],
      //   'register'=> $inputs['fix-user'],
      //   'editer'=> $inputs['fix-user'],
      //   'sales-date' => $inputs['fix-date'],
      //   'customer_id' => $customer->id,
      //   'fix_id' => $fix->id,
      //   'price' => $inputs['price'],
      //   'pay_id' => $inputs['pay'],
      //   'commission' => $inputs['commission'],
      //   'remarks' => $inputs['remarks']
      // ]);
      // $fix->update([
      //   'sale_id' => $sale->id
      // ]);
      // dd($inputs['stock']); 
      // 在庫数減少処理
      foreach($inputs['stock'] as $s) {
        $stock = Stock::FindOrFail((int)$s);
        $inventory = Inventory::where('id',$stock['inventory_id'])->first();
        // dd($inventory);
        $inventory->update([
          'quantity' => $inventory['quantity'] - 1,
          'consumption' => $inventory['consumption'] + 1,
        ]);
        // dd($stock);
      }
      // 在庫数減少処理
      return redirect()->route('sale.today');
    }
    public function edit(){
      return view('fixes.edit');
    }
}
