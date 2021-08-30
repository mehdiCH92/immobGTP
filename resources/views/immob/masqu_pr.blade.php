@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center">Proposer L'immobilisation: {{$m->desingnation}} en reforme</span></h2>
  </div>
<form action="{{ url('rfstore/'.$m->id) }}" method="POST" style="margin-top=0px" enctype='multipart/form-data'>
{{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-bordered table-striped " style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody>
    <tr style="text-align: center;border-style:solid;border-width: 1px;">
      <th scope="col"> code bare immobilisation </th>
	  <th scope="col"> {{$m->code_bar}} </th>
      <th scope="col"> id immobilisation  </th>
       <th scope="col">{{$m->id}}</th>
       <th scope="col"> date reforme </th>
        <th scope="col"> {{date('d F Y')}} </th>
    </tr>
    <tr style="text-align: center;">
    <th colspan="6" style="margin-left:16px;"> description</th>
    </tr>
    <tr style="text-align: center;border-style:solid;border-width: 1px;">
    <th colspan="6">
    <div class="form-group">

    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
  </div>
    </th>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection