<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Helpers\RouteName;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return Inertia(PagesVue::PAGE_AUTH_VERIFY_SHOW);
    }

    public function sendVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return Inertia::location(route(RouteName::PAGE_SHORTCUT_INDEX));
    }

    public function resendVerify(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
