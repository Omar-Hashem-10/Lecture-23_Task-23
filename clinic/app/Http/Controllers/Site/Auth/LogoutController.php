<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('site.auth.login.show');
    }
}
