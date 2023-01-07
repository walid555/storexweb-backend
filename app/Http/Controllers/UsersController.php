<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UsersController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository());
    }

    public function index()
    {
        try {

            $users = $this->userService->getAll();
            return view('admin.users.index', get_defined_vars());

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        try {

            $this->userService->save($request->only(['name' , 'email' , 'birth_date']));
            return redirect()->route('admin:users.index')->with(['alert-message' => 'User saved successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function edit(User $user)
    {
        return view('admin.users.edit' , get_defined_vars());
    }

    public function update(User $user , UpdateUserRequest $request)
    {
        try {

            $this->userService->update($user , $request->only(['name' , 'email' , 'birth_date']));
            return redirect()->route('admin:users.index')->with(['alert-message' => 'User updated successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function destroy(User $user)
    {
        try {

            $this->userService->delete($user);
            return redirect()->route('admin:users.index')->with(['alert-message' => 'User deleted successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }
}
