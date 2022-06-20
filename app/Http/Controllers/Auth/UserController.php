<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;

class UserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store()
    {
    }

    public function showEditPage()
    {
        return view('user_edit');
    }

    public function remove($userId)
    {
        $this->userRepository->deleteUser($userId);

        return redirect(route('admin_dashboard'));
    }

    public function givePriveleges($userId)
    {
        $this->userRepository->givePriveleges($userId);

        return redirect(route('admin_dashboard'));
    }

    public function create()
    {
        return view('admin_dashboard', [
            'users' => $this->userRepository->getAllUsers()
        ]);
    }
}
