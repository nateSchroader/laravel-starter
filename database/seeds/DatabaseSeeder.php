<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if( !empty( env( 'DEVELOPER_EMAIL' ) ) ){
            User::create( [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => env( 'DEVELOPER_EMAIL' ),
                'password' => bcrypt( 'demodemo' )
            ] );
        }
    }
}
