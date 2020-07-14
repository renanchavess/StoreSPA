<?php

namespace App\Http\Controllers;

use App\PaymentPlan;
use Illuminate\Http\Request;

class PaymentPlanController extends Controller
{
    public function index()
    {
        $paymentPlans = PaymentPlan::all();

        return response()->json($paymentPlans, 200);
    }

    protected function rules()
    {
        return [
            'description' => 'required',
            'installments' => 'required',
            'interest' => 'required',
            'active' => 'required',
        ];
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $paymentPlan = new PaymentPlan();
        $paymentPlan->description = $request->description;
        $paymentPlan->installments = $request->installments;
        $paymentPlan->interest = $request->interest;
        $paymentPlan->active = $request->active;
        
        if($paymentPlan->save())
            return response()->json($paymentPlan, 200);
        else
            return response()->json('error', 500);
    }

    public function show(PaymentPlan $paymentPlan)
    {
        //
    }

    public function edit($id)
    {
        $paymentPlan = PaymentPlan::find($id);

        if(!empty($paymentPlan))
            return response()->json($paymentPlan, 200);

        return response()->json('Bad Request', 400);
    }

    public function update(Request $request)
    {
        $paymentPlan = PaymentPlan::find($request->id);
        if(!empty($paymentPlan))
        {
            $paymentPlan->description = $request->description;
            $paymentPlan->description = $request->description;
            $paymentPlan->installments = $request->installments;
            $paymentPlan->interest = $request->interest;
            $paymentPlan->active = $request->active;
            
            if($paymentPlan->save())
                return response()->json('success', 200);
            
        }
        
        return response()->json('Bad Request', 400);
    }

    public function destroy(PaymentPlan $paymentPlan)
    {
        //
    }
}
