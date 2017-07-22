@extends( 'application' )
@section( 'title', 'Login' )
@section( 'bodyClass', 'transparent-navbar' )

@section( 'content' )
    <section class="hero">
        @include( 'components/flash-message' )

        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-centered">
                    {!! Form::open( [ 'url' => '/login', 'class' => 'hero-form _validate' ] ) !!}
                    <header>
                        <h4>Login</h4>
                    </header>

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>

                        {!! Form::email( 'email', null, [
                            'class' => 'form-control',
                            'id' => 'email',
                            'placeholder' => 'Email',
                            'required'
                         ] ) !!}

                        @include( 'components/validation-feedback', [ 'name' => 'email', 'errors' => $errors ] )
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        {!! Form::password( 'password', [
                            'class' => 'form-control',
                            'id' => 'password',
                            'placeholder' => 'Password',
                            'required'
                         ] ) !!}

                        @include( 'components/validation-feedback', [ 'name' => 'password', 'errors' => $errors ] )
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group text-center">
                            <a class="btn btn-link" href="{{ url('/applications/start') }}">
                                Register
                            </a>
                        </div>
                        <div class="col-sm-6 form-group text-center">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
