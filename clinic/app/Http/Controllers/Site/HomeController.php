<?php

namespace App\Http\Controllers\Site;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $majors = Major::orderBy('id', 'desc')->get();
        return view('web.site.pages.home.index', compact('majors'));
    }
}
