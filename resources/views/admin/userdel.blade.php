@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container" style="text-align: center;"><h3><span class="badge bg-secondary">Vouler vous vremment supprimer</span></h3></div>
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
          <td scope="col"><a href="{{ url('userDel/'.$b->id) }}" ><button type="submit" class="btn btn-danger" id="suprime"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button></a></td>
      @endforeach
         
        </tr>
    
      </tbody>
    </table>
</div>

@endsection