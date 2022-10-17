<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AppBaseController;
use Flash;
use Response;

class TermsOfServiceController extends Controller
{
    public function __construct()
    {

    }

    public function index( Request $request ) {
        return view('user_views.terms.index', ['lang' => app()->getLocale()]);
    }

    public function policy(Request $request) {
        return view('user_views.terms.policy', ['lang' => app()->getLocale()]);
    }

}
