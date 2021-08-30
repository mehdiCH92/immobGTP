@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('registerStor') }}">
                        {{ csrf_field() }}
                        <div class="container-fluid" style=" display: inline-block;text-align: center;">
                        <label for="inputGroupSelect01" style="margin-left: 175px;" >Role</label>
                        
                            <select class="custom-select" name="role"  id="inputGroupSelect01" style="width: 340px; height: 38px; margin-bottom:10px;margin-left: 30px; ">
                            <option selected value="Admin">Administrateur</option>
                                <option value="c_immob">Comptable immobilisation</option>
                                <option value="c_analy">Comptable Annalytique</option>
                                <option value="structure">Structure gestionnaire</option>             
                            </select>
                        
                    </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">USER</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-bordered table-striped " style="margin-top: 80px; margin-bottom: 0px; color:#000;background-color: #fff;">
      <thead>
        <tr class="text-center border border-dark text-dark bg-secondary">
           <th scope="col">name</th>
          <th style="width:800px;">user</th>
          <th style="width:800px;">role</th>
          <th scope="col" >Action</th>
        </tr>
      </thead>
      <tbody style="background-color: #ccd1d1">
      @foreach($lim as $b)
        <tr class="text-center">
          <th scope="row">{{$b->name}}</th>
          <th style="width:800px;">{{$b->email}}</th>
          <th style="width:800px;">{{$b->role}}</th>
          <td scope="col"><a href="{{ url('userD/'.$b->id) }}" ><button type="submit" class="btn btn-danger" id="suprime"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button></a></td>
      @endforeach
         
        </tr>
    
      </tbody>
    </table>
</div>

@endsection
