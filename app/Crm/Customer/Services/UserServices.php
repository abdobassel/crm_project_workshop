<?php

namespace Crm\Customer\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\ProjectCreation;
use Crm\Base\Requests\CreateUser;
use Crm\Base\Requests\CreateProject;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserServices
{
    public function createUser(CreateUser $request)
    {
        // name // customerid // cost // status

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return $user;
    }
}
