<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller {

    public function index( Request $request ){
        return view( 'public/index' );
    }

    public function privacyPolicy( Request $request ){
        return view( 'public/privacy-policy' );
    }

    public function termsOfUse( Request $request ){
        return view( 'public/terms-of-use' );
    }
}
