<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Crm\Base\Requests\CreateCustomer;
use Crm\Customer\Services\CustomerServices;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{


    private CustomerServices $customerServices;


    public function __construct(CustomerServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }
    public function index()
    {

        return $this->customerServices->index();
    }

    public function show($id)
    {


        return $this->customerServices->show($id) ?? response()->json(['status' => 'not found id'], Response::HTTP_NOT_FOUND);
    }

    public function create(CreateCustomer $request)
    {

        return $this->customerServices->create($request);
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
        return $this->customerServices->update($request, $id);
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
