@if ( Session::has( 'message' ) )
    <div class="alert alert-info">
        <div class="container">
            <span>
                {!! Session::get( 'message' ) !!}
            </span>
        </div>
    </div>
@endif
@if ( Session::has( 'error' ) )
    <div class="alert alert-danger">
        <div class="container">
            <span>
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {!! Session::get( 'error' ) !!}
            </span>
        </div>
    </div>
@endif