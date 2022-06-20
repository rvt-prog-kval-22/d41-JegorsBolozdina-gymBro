<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

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

    public function showEditDataPage()
    {
        return view('user_edit_data');
    }

    public function showEditPassPage()
    {
        return view('user_edit_pass');
    }

    public function submitEditPass(Request $request)
    {
        $user = auth()->user();
        $messageBag = new MessageBag;

        $request->validate([
            'new_password' => ['required', Rules\Password::defaults()],
        ]);

        if ($request->new_password === $request->password_confirmation
            && Hash::check($request->password, $user->password)){
            $userRecord = $this->userRepository->getUserById($user->id);
            $userRecord->password = Hash::make($request->new_password);
            $userRecord->save();
            return redirect(route('user.editPass'));
        }

        $messageBag->add('error', 'Password not confirmed/current password is incorrect');
        return redirect()->back()->with('errors', $messageBag);
    }

    public function submitUpdateInfo(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if (Hash::check($request->password, $user->password)){
            $userRecord = $this->userRepository->getUserById($user->id);
            $userRecord->name = $request->name;
            $userRecord->email = $request->email;
            $userRecord->save();
            return redirect(route('user.editData'));
        }

        $messageBag = new MessageBag;
        $messageBag->add('error', 'Incorrect data, check your password again');

        return redirect()->back()->with('errors', $messageBag);
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
