<?php
namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait Uuids {
    public static function bootUuids(){
        static::creating( function ( $model ){
            $model->incrementing = false;
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        } );
    }
}