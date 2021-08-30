
@extends('layouts.master')
@section('content')
<form>
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody>
    <tr style="text-align: center;">
      <th>n° clasification </th>
      <td scope="col">555</td>
      <th> Nome class </th>
   <td scope="col"><input type="text" class="form-control" placeholder="électromenagie" aria-label="class" aria-describedby="basic-addon1"></td>
   <th> Dépréciation </th>
         <td scope="col"> <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">%</span>
  </div>
</div></td>

    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection