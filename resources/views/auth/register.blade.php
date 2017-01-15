@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="medium-6 float-center large-4 columns">

            <h1>Register</h1>

            <form role="form" method="POST" action="{{route('register')}}">
                {{csrf_field()}}

                <label for="email" class="col-md-4 control-label">
                    E-mail address
                </label>
                <input id="email" type="email" class="form-control"
                       name="email"
                       value="{{old('email')}}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif

                <label for="password"
                       class="col-md-4 control-label">Password</label>

                <input id="password" type="password" class="form-control"
                       name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                @endif

                <label for="password_confirmation"
                       class="col-md-4 control-label">Confirm password</label>
                <input id="password_confirmation" type="password"
                       class="form-control" name="password_confirmation"
                       required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>
                            {{$errors->first('password_confirmation')}}
                        </strong>
                    </span>
                @endif

                <button type="submit" class="button">
                    Register
                </button>

            </form>

        </div>

    </div>

@endsection
