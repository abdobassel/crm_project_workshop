<?php

namespace Crm\Customer\Services;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Events\ProjectCreation;
use Crm\Base\Requests\CreateProject;
use Symfony\Component\HttpFoundation\Response;

class ProjectServices
{
    public function createProject(CreateProject $request)
    {
        // name // customerid // cost // status

        $project = new Project();
        $project->p_cost = $request->cost;
        $project->p_name = $request->name;
        $project->status = $request->status;
        $project->customer_id = $request->customer_id;
        $project->save();

        return $project;
    }

    public function projectByCustomer($customer_id)
    {


        return Project::where('customer_id', $customer_id)->get();
    }

    public function updateProject(Request $request, $id, $customer_id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response([
                'status' => 'false',
                'msg' => ' not found project id'
            ], Response::HTTP_NOT_FOUND);
        }
        if ($project->customer_id != $customer_id) {
            return response([
                'status' => 'False',
                'msg' => 'Not Allowed for this Customer'
            ], Response::HTTP_BAD_REQUEST);
        }

        $project->p_cost = $request->cost;
        $project->p_name = $request->name;
        $project->status = $request->status;
        $project->save();
        return $project;
    }
    public function deleteProject($id, $customer_id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response([
                'status' => 'false',
                'msg' => ' not found project id'
            ], Response::HTTP_NOT_FOUND);
        }
        if ($project->customer_id != $customer_id) {
            return response([
                'status' => 'False',
                'msg' => 'Not Allowed for this Customer'
            ], Response::HTTP_BAD_REQUEST);
        }


        $project->delete();
        return response(['status' => 'true', 'msg' => 'Deleted Successfuly'], Response::HTTP_ACCEPTED);
    }
}
