@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top:100px;">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
               
                <div class="panel-body" >
                   <div class="container" style="display: inline-block;">
                    <table style="width: 100%;">
                        <tr >
                            <td style="width: 20%;padding-left: 10px;"><img src="t.jpg" alt="Girl in a jacket" width="200" height="200"></td>
                            <td  style="width: 50%;padding-left: 80px;">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" >
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">USER </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                            </td>
                            <td style="width: 20%;padding-right: 20px;"><img src="s.jpg" alt="Girl in a jacket" width="200" height="200"></td>
                </tr>
                </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
