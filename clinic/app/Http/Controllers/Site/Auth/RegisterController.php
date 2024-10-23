<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\RegisterRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegisterController extends Controller
{
    public function show()
    {
        return view('web.site.auth.register.index');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {

        $data = $request->validated();

        if($request->input('type') == 'doctor') $data['is_doctor'] = true;
        if($request->input('type') == 'patient') $data['is_patient'] = true;

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('site.home.index');

    }
}
