@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="medium-6 float-center large-4 columns">

            <h1>Log in</h1>

            <hr>

            <form role="form" method="POST" action="{{route('login')}}">
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

                <input type="hidden" name="remember" value="1">

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="button">
                            Login
                        </button>

                        <a href="{{url('/password/reset')}}"
                           class="float-right">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
