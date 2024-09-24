<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $customers = Customer::all();

    return $customers->map(function($customer) {
        return [
            'customer_id' => $customer->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'address' => $customer->address,
            'city' => $customer->city,
            'state' => $customer->state,
            'points' => $customer->points,
            'isgoldmember' => $customer->isGoldMember() 
        ];
    });
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'birth_date'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'city'=>'required',
        'state'=>'required',
        'points'=>'required'

       ]);
       $customer = Customer::create($fields);
       return ['customer' => $customer]; 
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return [
            'customer_id'=>$customer->customer_id,
            'first_name'=>$customer->first_name,
            'last_name'=>$customer->last_name,
            'address'=>$customer->address,
            'city'=>$customer->city,
            'state'=>$customer->state,
            'points'=>$customer->points,
            'Gold Member'=>$customer->isGoldMember()
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
