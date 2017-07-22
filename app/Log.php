<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
    use Traits\Uuids;

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'method',
        'path',
        'level',
        'message',
        'meta',
        'ip'
    ];

    // Setters
    public function setMetaAttribute( $value ){
        if( is_array( $value ) ){
            $this->attributes[ 'meta' ] = serialize( $value );
        }
        else{
            $this->attributes[ 'meta' ] = $value;
        }
    }
}
