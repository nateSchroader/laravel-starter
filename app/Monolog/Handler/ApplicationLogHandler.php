<?php declare( strict_types = 1 );

namespace App\Monolog\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Log;

/**
 * Stores to any stream resource
 *
 * Can be used to store into php://stderr, remote and local files, etc.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class ApplicationLogHandler extends AbstractProcessingHandler {
    static protected $errorClasses = [
        'warning',
        'emergency',
        'error',
        'critical',
        'alert',
    ];

    protected function write( array $record ){
        $newRecord = [
            'level' => strtolower( $record[ 'level_name' ] ),
            'method' => Request::method(),
            'path' => Request::path(),
            'ip' => Request::ip(),
            'meta' => [ ]
        ];

        if( !in_array( strtolower( $record[ 'level_name' ] ), self::$errorClasses ) ){
            $newRecord[ 'message' ] = $record[ 'message' ];
        }
        else{
            $newRecord[ 'meta' ][ 'stack' ] = $record[ 'message' ];
        }

        if( !empty( $record[ 'context' ] ) ){
            $newRecord[ 'meta' ][ 'context' ] = $record[ 'context' ];
        }

        if( Auth::check() ){
            $user = Auth::user();

            $newRecord[ 'user_id' ] = $user->id;
            $newRecord[ 'user_type' ] = $user->type;
        }

        Log::create( $newRecord );
    }
}