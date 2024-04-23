<?php

namespace Crm\Customer\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Events\CustomerCreation;
use Crm\Base\Requests\CreateCustomer;
use Symfony\Component\HttpFoundation\Response;

class CustomerServices
{
    public function index()
    {

        return response(Customer::all());
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }

    public function create(CreateCustomer $request)
    {

        $customer = new Customer();
        $customer->username = $request->username;
        $customer->email = $request->email;
        // $customer->password = $request->password;
        $customer->save();
        event(new CustomerCreation($customer)); // run event

        return $customer;
    }



    public function delete()
    {
    }




    public function store(Request $request)
    {
        //
    }




    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCustomer $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        } else {
            $customer->username = $request->username;
            $customer->save();
            return response()->json(['message' => 'Updated', 'data' => $customer->username], Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
