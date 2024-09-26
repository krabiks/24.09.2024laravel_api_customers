<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
 
        $results = DB::table('customers as c')
        ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
        ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
        ->select(
            'c.customer_id',
            'c.first_name',
            'c.last_name',
            'c.address',
            'c.city',
            'c.state',
            'c.points',
            'o.order_date',
            'os.name as order_status_name'
        )
        ->tosql();

        return $results;

     return $customers;
      }
 



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $fields = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'birth_date' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'points' => 'required',
    ]);

    $customer = Customer::create($fields);
    return ['customer' => $customer];
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'points' => 'required',
        ]);
    
        $customer = Customer::create($fields);
        return ['customer' => $customer];
    }

    /**
     * Display the specified resource.
     */
    public function show($customerId)
{
    $customer = DB::select('SELECT 
        c.customer_id,
        c.first_name,
        c.last_name,
        c.address,
        c.city,
        c.state,
        c.points,
        o.order_date,
        os.name as status
    FROM 
        customers c
    JOIN 
        orders o ON c.customer_id = o.customer_id
    JOIN 
        order_statuses os ON o.order_id = os.order_status_id 
        WHERE 
        c.customer_id = ?', [$customerId]);

    if (empty($customer)) {
        return response()->json(['message' => 'Customer not found'], 404);
    }
    // \Log::debug();
    return $customer;
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
