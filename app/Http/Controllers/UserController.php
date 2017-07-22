<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller {

    public function __construct( Request $request ){
        View::share( '_links', [
            'submenu' => [
                [
                    'label' => 'Profile',
                    'href' => url( '/profile' )
                ],
                [
                    'label' => 'Update Password',
                    'href' => url( '/profile/updatePassword' )
                ]
            ]
        ] );
    }

    public function view( Request $request ){
        return view( 'profile/view', [
            'user' => Auth::user()
        ] );
    }

    public function view_update_password( Request $request ){
        return view( 'profile/password-update', [
            'user' => Auth::user()
        ] );
    }

    public function update( $user_id, Request $request ){
        $user = Auth::user();

        $this->validate( $request, [
            'user.email' => 'bail|required|max:255|email',
            'user.first_name' => 'bail|required|max:255',
            'user.last_name' => 'bail|required|max:255'
        ] );

        if( $user->type === User::TYPE_ADMIN && $user->id !== $user_id ){
            $user = User::findOrFail( $user_id );
        }

        $email = strtolower( $request->input( 'user.email' ) );

        $emailConflictCount = User::where( 'email', $email )
            ->where( 'id', '!=', $user->id )
            ->count();

        if( $emailConflictCount > 0 ){
            $request->session()->flash( 'error', 'That email has already been taken' );
            return redirect()->route( 'profile' );
        }

        $user->first_name = $request->input( 'user.first_name' );
        $user->last_name = $request->input( 'user.last_name' );
        $user->email = $email;

        if( !$user->save() ){
            $request->session()->flash( 'error', config( 'constants.alert.default' ) );
        }
        else{
            $request->session()->flash( 'message', 'Profile Updated' );
        }

        return redirect()->route( 'profile' );
    }

    public function update_password( Request $request ){
        $this->validate( $request, [
            'user.current_password' => 'bail|required|max:255',
            'user.password' => 'bail|required|max:255|min:8',
            'user.password_confirm' => 'bail|required|max:255|same:user.password'
        ] );

        $user = Auth::user();

        if( !Hash::check( $request->input( 'user.current_password' ), $user->password ) ){
            $request->session()->flash( 'error', 'Current password is incorrect' );
            return redirect()->route( 'profile' );
        }

        $user->password = bcrypt( $request->input( 'user.password' ) );

        if( !$user->save() ){
            $request->session()->flash( 'error', config( 'constants.alert.default' ) );
        }
        else{
            $request->session()->flash( 'message', 'Password Updated' );
        }

        return redirect()->route( 'profile' );
    }
}
