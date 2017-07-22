<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

use App;
use App\Application;
use App\User;
use App\EarlySettlement;

class SecureController extends Controller {

    public function __construct(){
        $this->middleware( 'auth' );
    }

    public function dashboard( Request $request ){
    }
}
