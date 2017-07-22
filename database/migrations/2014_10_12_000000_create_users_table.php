<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->uuid( 'id' )->default( null );
            $table->timestamps();
            $table->softDeletes();

            $table->string( 'first_name' )->default( null )->nullable();
            $table->string( 'last_name' )->default( null )->nullable();
            $table->string( 'email' )->unique();
            $table->string( 'password' );
            $table->rememberToken();

            $table->primary( 'id' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'users' );
    }
}
