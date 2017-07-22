(function( $ ){
    var updateNavBar = function(){
        if( $( this ).scrollTop() > 60 ){
            $( '#primary-nav' ).addClass( 'non-transparent' );
        }
        else{
            $( '#primary-nav' ).removeClass( 'non-transparent' );
        }
    };

    $( document ).scroll( updateNavBar );
    updateNavBar();
})( jQuery );