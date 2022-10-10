<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TermsOfServiceController extends AppBaseController {
    public function __construct()
    {

    }

    public function index( Request $request ) {
        return view('user_views.terms.index', ['lang' => app()->getLocale()]);
    }

}
