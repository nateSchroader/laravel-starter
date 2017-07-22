<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'logs', function ( Blueprint $table ) {
            $table->uuid( 'id' );
            $table->timestamps();

            $table->uuid( 'user_id' )->default( null )->nullable();
            $table->string( 'method' )->default( null )->nullable();
            $table->string( 'path' )->default( null )->nullable();
            $table->string( 'level' )->default( null )->nullable();
            $table->string( 'message' )->default( null )->nullable();
            $table->text( 'meta' )->default( null )->nullable();
            $table->ipAddress( 'ip' )->default( null )->nullable();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'logs' );
    }
}
