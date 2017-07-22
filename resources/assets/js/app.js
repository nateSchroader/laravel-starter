/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

(function( $ ){
    $( '.event-link' ).on( 'click', function( event ){
        event.preventDefault();

        ga( 'send', 'event', {
            eventCategory: 'Outbound Link',
            eventAction: 'click',
            eventLabel: $( this ).attr( 'data-event-name' )
        } );

        window.location = event.target.href;
    } );

    (function initializePostButton(){
        var postButtons = $( '._post-button' );

        function readCookie( name ){
            var nameEQ = encodeURIComponent( name ) + "=";
            var ca = document.cookie.split( ';' );
            for( var i = 0; i < ca.length; i++ ){
                var c = ca[ i ];
                while( c.charAt( 0 ) === ' ' ) c = c.substring( 1, c.length );
                if( c.indexOf( nameEQ ) === 0 ) return decodeURIComponent( c.substring( nameEQ.length, c.length ) );
            }
            return null;
        }

        postButtons.on( 'click', function( event ){
            var _this = $( this );
            var method = _this.attr( 'data-method' ) || 'post';
            var token = $( 'input[type="hidden"][name="_token"]:first' ).attr( 'value' );

            if( !_this.attr( 'disabled' ) ){
                var form = document.createElement( 'form' );
                var hiddenField = document.createElement( 'input' );

                hiddenField.setAttribute( 'type', 'hidden' );
                hiddenField.setAttribute( 'name', '_method' );
                hiddenField.setAttribute( 'value', method.toUpperCase() );

                if( token !== null ){
                    var tokenField = document.createElement( 'input' );
                    tokenField.setAttribute( 'type', 'hidden' );
                    tokenField.setAttribute( 'name', '_token' );
                    tokenField.setAttribute( 'value', token );
                    form.appendChild( tokenField );
                }

                form.setAttribute( 'method', 'POST' );
                form.setAttribute( 'action', _this.attr( 'data-href' ) );
                form.appendChild( hiddenField );

                document.body.appendChild( form );

                _this.attr( 'disabled', true );

                form.submit();
            }
        } );
    })();

    (function initializeSubmitButton(){
        var submitButtons = $( '._submit-button' );

        submitButtons.on( 'click', function( event ){
            var _this = $( this );
            var form = _this.parents( 'form:first' );

            event.preventDefault();

            if( form.data( 'validator' ) ){
                if( form.valid() ){
                    _this.data( 'button-content', _this.html() );
                    _this.html( '<i class="fa fa-cog fa-spin"></i>' );
                    form.submit();
                    _this.attr( 'disabled', true );
                }
            }
            else{
                _this.html( '<i class="fa fa-cog fa-spin"></i>' );
                form.submit();
                _this.attr( 'disabled', true );
            }
        } );

        submitButtons.removeAttr( 'disabled' );
    })();

    (function initForms( $ ){
        var forms = $( 'form._validate' );

        forms.each( function( index, form ){
            var validator = $( form ).validate( {
                highlight: function( element ){
                    $( element ).closest( '.form-group' ).addClass( 'has-error' );
                },
                unhighlight: function( element ){
                    $( element ).closest( '.form-group' ).removeClass( 'has-error' );
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function( error, element ){
                    if( element.parent( '.input-group' ).length ){
                        error.insertAfter( element.parent() );
                    } else{
                        error.insertAfter( element );
                    }
                },
                submitHandler: function( form ){
                    var stopSubmit = $( form ).attr( 'data-stop-submit' );

                    if( stopSubmit !== 'data-stop-submit' && stopSubmit !== '1' && stopSubmit !== 'true' ){
                        form.submit();
                    }
                }
            } );
        } );
    })( $ );

    $.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each( a, function(){
            if( o[ this.name ] ){
                if( !o[ this.name ].push ){
                    o[ this.name ] = [ o[ this.name ] ];
                }
                o[ this.name ].push( this.value || '' );
            } else{
                o[ this.name ] = this.value || '';
            }
        } );
        return o;
    };

    $( '#primary-nav' ).removeClass( 'bar-loading' );
})( jQuery );