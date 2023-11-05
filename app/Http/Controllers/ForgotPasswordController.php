<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Http\Response;

class ForgotPasswordController extends Controller
{
    public function __construct(private Password $password) {
    }

    public function __invoke(ForgotPasswordRequest $request): Response
    {
        $email = $request->only('email');

        $this->password::sendResetLink($email);

        return response(status: 204);
    }
}
