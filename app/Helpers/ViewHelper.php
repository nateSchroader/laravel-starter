<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class ViewHelper {

    public static function set_active( $path, $className = 'active' ){
        if( substr( $path, 0, 1 ) === '/' ){
            $path = substr( $path, 1 );
        }

        if( Request::is( $path ) || Request::fullUrlIs( $path ) ){
            return $className;
        }
        else {
            return '';
        }
    }
}
