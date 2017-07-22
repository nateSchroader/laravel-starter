@extends( 'application' )
@section( 'title', 'User Profile' )

@section( 'content' )
    <section>
        <div class="container">
            @include( 'components/flash-message' )

            {!! Form::open([
                'url' => '/users/' . $user->id,
                'method' => 'put',
                'class' => '_validate'
            ]) !!}
            <div class="row">
                <div class="col-md-7 relative">
                    <header>
                        <h4>{{$user->full_name}}</h4><br>
                        <h5>User Profile</h5>
                        <a class="back" href="/dashboard">Back</a>
                    </header>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="first-name">First Name</label>
                            {!! Form::text( 'user[first_name]', $user->first_name, [
                                'class' => 'form-control',
                                'id' => 'first-name',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.first_name', 'errors' => $errors ] )
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="last-name">Last Name</label>
                            {!! Form::text( 'user[last_name]', $user->last_name, [
                                'class' => 'form-control',
                                'id' => 'last-name',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.last_name', 'errors' => $errors ] )
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="email">Email</label>
                            {!! Form::email( 'user[email]', $user->email, [
                                'class' => 'form-control',
                                'id' => 'email',
                                'required'
                             ] ) !!}

                            @include( 'components/validation-feedback', [ 'name' => 'user.email', 'errors' => $errors ] )
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-7">
                            <button class="_submit-button btn btn-success btn-block" type="submit" disabled="disabled">
                                Update Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection