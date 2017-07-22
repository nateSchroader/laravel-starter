@extends( 'application' )
@section( 'title', 'Reset Password' )

@section( 'content' )
    <section>
        @include( 'components/flash-message' )

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-5 col-centered">
                    {!! Form::open( [ 'url' => '/password/email', 'class' => '_validate' ] ) !!}
                    <header>
                        <h4>Reset Password</h4>
                    </header>

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>

                        {!! Form::email( 'email', old( 'email' ), [
                            'class' => 'form-control',
                            'id' => 'email',
                            'placeholder' => 'Email',
                            'required'
                         ] ) !!}

                        @include( 'components/validation-feedback', [ 'name' => 'email', 'errors' => $errors ] )
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="_submit-button btn btn-primary btn-block">
                            Send Password Reset Link
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
