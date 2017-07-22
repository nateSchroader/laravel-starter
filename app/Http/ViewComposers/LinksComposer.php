<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LinksComposer {

    public $leftLinks = [ ];
    public $rightLinks = [ ];
    public $subMenuLinks = [ ];

    public function setGuestLinks(){
        array_push( $this->rightLinks, [
            'label' => 'Home',
            'href' => url( '/' )
        ] );

        array_push( $this->rightLinks, [
            'label' => 'Login',
            'href' => url( '/login' )
        ] );
    }

    public function _getLinks( $view ){
        if( Auth::guest() ){
            $this->setGuestLinks();
        }
        else if( Auth::check() ){
            $user = Auth::user();
            $view->with( '_user', $user );

            array_push( $this->rightLinks, [
                'label' => '<i class="fa fa-user"></i>&nbsp;' . $user->full_name,
                'href' => url( '/profile' )
            ] );

            array_push( $this->rightLinks, [
                'label' => '<i class="fa fa-power-off"></i>&nbsp;Logout',
                'href' => url( '/logout' )
            ] );
        }

        $links = [
            'left' => $this->leftLinks,
            'right' => $this->rightLinks,
            'submenu' => $this->subMenuLinks
        ];

        return $links;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose( View $view ){
        $_links = $this->_getLinks( $view );
        $existingData = $view->getData();

        if( isset( $existingData[ '_links' ] ) ){
            $_links = array_merge_recursive( $existingData[ '_links' ], $_links );
        }

        $view->with( '_links', $_links );
    }
}