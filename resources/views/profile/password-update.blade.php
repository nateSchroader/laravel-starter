@extends( 'application' )
@section( 'title', 'Update Password' )

@section( 'content' )
    <section>
        <div class="container">
            @include( 'components/flash-message' )

            {!! Form::open([
                'url' => '/users/updatePassword',
                'method' => 'put',
                'class' => '_validate'
            ]) !!}
            <div class="row">
                <div class="col-md-7 relative">
                    <header>
                        <h4>Update Password</h4><br>
                        <h5>User Profile</h5>
                        <a class="back" href="/profile">Back</a>
                    </header>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="current-password">Current Password</label>

                            {!! Form::password( 'user[current_password]', [
                                'class' => 'form-control',
                                'id' => 'current-password',
                                'placeholder' => 'Password',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.current_password', 'errors' => $errors ] )
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="user-password">Password</label>

                            {!! Form::password( 'user[password]', [
                                'class' => 'form-control',
                                'id' => 'user-password',
                                'placeholder' => 'Password',
                                'minlength' => 8,
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.password', 'errors' => $errors ] )
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="user-password-confirm">Password Confirm</label>

                            {!! Form::password( 'user[password_confirm]', [
                                'class' => 'form-control',
                                'id' => 'user-password-confirm',
                                'placeholder' => 'Password Confirm',
                                'minlength' => 8,
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.password_confirm', 'errors' => $errors ] )
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-7">
                            <button class="_submit-button btn btn-success btn-block" type="submit" disabled="disabled">
                                Update Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection