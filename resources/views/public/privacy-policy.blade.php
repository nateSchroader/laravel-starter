@extends( 'application' )
@section( 'title', 'Privacy Policy' )
@section( 'bodyClass', 'transparent-navbar' )

@section( 'content' )
    <section class="hero">
        @include( 'components/flash-message' )

        <div class="container">
            <div class="row">
                <div id="privacy-policy" class="col-md-9 col-centered">
                </div>
            </div>
        </div>
    </section>
@endsection