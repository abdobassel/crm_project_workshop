<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CustomRequest;
use Crm\Base\Requests\CreateProject;
use Crm\Customer\Services\ProjectServices;
use Crm\Customer\Services\CustomerServices;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    private ProjectServices $projectServices;
    private CustomerServices $customerServices;
    public function __construct(ProjectServices $projectServices, CustomerServices $customerServices)
    {
        $this->projectServices = $projectServices;
        $this->customerServices = $customerServices;
    }

    public function createProject(CreateProject $request)
    {

        $customer_id = $this->customerServices->show($request->customer_id);
        if (!$customer_id) {
            return response()->json(['status' => 'Customer not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->projectServices->createProject($request);
    }
    public function projectByCustomer(Request $request)
    {

        return $this->projectServices->projectByCustomer($request->customer_id);
    }


    public function updateProject(Request $request)
    {
        return $this->projectServices->updateProject($request, $request->id, $request->customer_id);
    }
    public function deleteProject(Request $request)
    {
        return $this->projectServices->deleteProject($request, $request->id, $request->customer_id);
    }
}
