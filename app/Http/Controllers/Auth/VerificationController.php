<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifyEmail;

class VerificationController extends Controller
{
    public function send(Request $request)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
        }

        return back()->with('status', 'Verification link sent!');
    }
} 