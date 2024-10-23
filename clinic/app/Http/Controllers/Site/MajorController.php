<?php

namespace App\Http\Controllers\Site;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('web.site.pages.major.index');
    }
}
