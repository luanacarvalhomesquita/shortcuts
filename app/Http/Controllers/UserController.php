<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Helpers\RouteName;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct(private readonly User $user)
    {
    }

    public function create()
    {
        return Inertia(PagesVue::PAGE_USER_CREATE);
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->user->create([
            'password' => bcrypt($request->input('password')),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        Auth::login($user);

        return Inertia::location(route(RouteName::PAGE_SHORTCUT_INDEX));
    }
}
