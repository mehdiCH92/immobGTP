@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center" > Billant Ammortissement </span></h2>
  </div>
<form method="POST" action="bi">
    {{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <thead>
    <tr style="text-align: center;">
      <th>l'année</th>
      <td colspan="4"><input type="text" class="form-control" name="annee" placeholder="l'annee" ></td>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
      <th>commence a </th>
      <td scope="col"><input class="form-control" type="date" value="yyyy-mm-dd"></td>
      <th>terminer a </th>
    <td scope="col"><input class="form-control" type="date" value="yyyy-mm-dd"></td>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection