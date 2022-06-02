<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    //
    public function index(){
      // // $span=Carbon::today()->subMonth(2);
      $contracts = Contract::where('status',1)->latest('confirmation-date')
      
      ->get()
      ;
      // dd($contracts);
      $contracts = Contract::where('status',1)
      ->latest('confirmation-date')
      ->join('plans', 'contracts.plan_id','=','plans.id')
      ->select('contracts.id','plan_id','customer_id','contracts.status','contract-date','bill','incentive','confirmation','plan-name','confirmation-date')
      ->get()
      ->groupBy(function ($contract){
        return $contract['customer_id'];
      });
      // dd($contracts);
      return view('contracts.index',compact('contracts'));
    }
    public function new(){
      $plans = Plan::all();
      $customer = Customer::all();
      return view('contracts.new',compact('plans','customer'));
    }
    public function show($id){
      $contract = Contract::FindOrFail($id);
      foreach(explode(',',$contract['plan_id']) as $c){
        $plans[] = Plan::where('id', $c)->first();
      }
      return view('contracts.show', compact('contract','plans'));
    }
    public function renew($id){
      $all_plan = Plan::all();
      $contract = Contract::FindOrFail($id);
      $plans = explode(',',$contract['plan_id']);
      return view('contracts.renew', compact('contract','plans','all_plan'));
    }
    public function create(Request $request){
      $inputs = $request->all();
      // dd($inputs);
      $request->validate([
        'customer'=>'required',
        'customer-number'=>'required',
        'start'=>'required',
        'plan'=>'required'
      ],[],[
        'customer'=>'お客様名',
        'customer-number'=>'お客様番号',
        'start'=>'サービス開始日',
        'plan'=>'プラン名'
      ]);
      $customer = Customer::where('name', $inputs['customer'])
      ->first();
      if(!isset($customer)){
        if(isset($inputs['company'])){
          $status = 0;
        }else{
          $status = 1;
        }
        $customer = Customer::create([
          'status' => $status,
          'name'=> $inputs['customer'],
          'number' => $inputs['customer-number'],
          'created_at' => date('Y/m/d H:i:s'),
          'updated_at' => date('Y/m/d H:i:s')
        ]);
      }
      // persentageは合計金額(税込)の15%
      $incentive = $inputs['bill'] * 3 / 20;
      // dd($inputs);
      $plan_array = implode(",", $inputs['plan']);
      Contract::create([
        'status' => 1,
        'plan_id' => $plan_array,
        'customer_id' => $customer->id,
        'contract-date' => $inputs['start'],
        'contract-fee' => $inputs['contract-fee'],
        'bill' => $inputs['bill'],
        'incentive' => $incentive,
      ]);
      return redirect()->route('contract.index')->with('flash_messages', "契約成立");
    }
    public function update(Request $request, $id){
      $inputs = $request->all();
      // dd($inputs);
      $request->validate([
        'confirmation-user'=>'required',
        'confirmation-date'=>'required',
        'bill'=>'required',
      ],[],[
        'confirmation-user'=>'登録担当者',
        'confirmation-date'=>'確定日',
        'bill'=>'合計金額',
      ]);
      $incentive = $inputs['bill'] * 3 / 20;
      $contract = Contract::FindOrFail($id);
      
      $contract->create([
        'status' => 1,
        'plan_id' => $contract['plan_id'],
        'customer_id' => $contract['customer_id'],
        'contract-date' => $contract['contract-date'],
        'contract-fee' => $contract['contract-fee'],
        'data-traffic-cost'=> $inputs['data-traffic-cost'],
        'bill'=>$inputs['bill'],
        'incentive'=>$incentive,
        'confirmation'=>1,
        'confirmation-date'=>$inputs['confirmation-date'],
        'confirmation-user'=> $inputs['confirmation-user'],
      ]);
      Sale::create([
        'status' => 1,
        'user_id' => $inputs['confirmation-user'],
        'sales-date' => $inputs['confirmation-date'],
        'price'=>$inputs['bill'],
        'customer_id'=>$contract['customer_id'],
        'contract_id'=>$contract['id'],
        'category_id'=>7,
        'remarks'=>$inputs['remarks'],
        'pay_id'=>4,
        'created_at' => date('Y/m/d H:i:s'),
        'updated_at' => date('Y/m/d H:i:s')
      ]);
      
      return redirect()->route('contract.index')->with('flash_message', '成功!!!');
    }
    
}
