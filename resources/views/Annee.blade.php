@extends('layouts.master')
@section('content')
<form>
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <thead>
    <tr style="text-align: center;">
      <th>N° imobilisation</th>
      <td scope="col">2001</td>
      <th>l'année</th>
      <td scope="col"><input type="text" class="form-control" placeholder="l'annee" aria-label="l'annee" aria-describedby="basic-addon1"></td>
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
