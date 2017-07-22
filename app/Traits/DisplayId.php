<?php
namespace App\Traits;

trait DisplayId {
    public static $displayIdLength = 7;
    public static $dashBreak = 2;

    public static function bootDisplayId(){
        static::creating( function ( $model ){
            if( empty( $model->display_id ) ){
                $min = pow( 36, self::$displayIdLength - 2 );
                $max = pow( 36, self::$displayIdLength ) - 1;

                $displayId = null;

                while( $displayId === null ){
                    $seed = rand( $min, $max );
                    $newId = (string) strtoupper( base_convert( $seed, 10, 36 ) );

                    $newId = substr( $newId, 0, self::$dashBreak ) . '-' . substr( $newId, self::$dashBreak, strlen( $newId ) );

                    // Check if UUID has been taken
                    $conflictCount = self::where( 'display_id', $newId )->count();

                    if( $conflictCount === 0 ){
                        $displayId = $newId;
                    }
                }

                $model->display_id = $displayId;
            }
        } );
    }
}