<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;

class AdminPanelController extends Controller
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('admin_dashboard', [
            'users' => $this->userRepository->getAllUsers()
        ]);
    }


    public function store()
    {
    }
}
