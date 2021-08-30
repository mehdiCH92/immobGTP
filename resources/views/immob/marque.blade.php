@extends('layouts.master')
@section('content')
<form action="{{url('marque_st')}}" method="POST">
{{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody>
    <tr style="text-align: center;">
      <th>Ajouter une Marque </th>
      <th> nome de marque </th>
   <td scope="col"><input type="text" name="marque" class="form-control" placeholder="GTP Oran" aria-label="Branche" aria-describedby="basic-addon1"></td>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
<div class="container">
<table class="table table-bordered table-striped " style="margin-top: 80px; margin-bottom: 0px; color:#000;background-color: #fff;">
  <thead>
    <tr class="text-center border border-dark text-dark bg-secondary">
       <th scope="col" >ID</th>
      <th style="width:800px;"  >Marque</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody style="background-color: #ccd1d1">
  @foreach($lim as $b)
    <tr class="text-center">
      <th scope="row">{{$b->id}}</th>
      <td style="width:800px;">{{$b->marque}}</td>
      <td scope="col"><form action="{{ url('marque/'.$b->id) }}" method="POST"> {{csrf_field()}}{{ method_field('DELETE')}}<button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button></form></td>
  @endforeach
     
    </tr>

  </tbody>
</table>

</div>
@endsection