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
                    {!! Form::open( [ 'url' => '/password/reset', 'class' => '_validate' ] ) !!}
                    {!! Form::hidden( 'token', $token ) !!}

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

                    <div class="row">
                        <div class="col-sm-6 form-group has-feedback">
                            <label for="new-password">New Password</label>

                            {!! Form::password( 'password', [
                                'class' => 'form-control',
                                'id' => 'new-password',
                                'placeholder' => 'New Password',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'password', 'errors' => $errors ] )
                        </div>
                        <div class="col-sm-6 form-group has-feedback">
                            <label for="password-confirmation">Password Confirm</label>

                            {!! Form::password( 'password_confirmation', [
                                'class' => 'form-control',
                                'id' => 'password-confirmation',
                                'placeholder' => 'Confirm Password',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'password_confirmation', 'errors' => $errors ] )
                        </div>
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
