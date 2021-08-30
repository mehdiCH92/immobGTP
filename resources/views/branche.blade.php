@extends('layouts.master')
@section('content')
<form>
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody>
    <tr style="text-align: center;">
      <th>n° brance </th>
      <td scope="col">555</td>
      <th> Nome Branche </th>
   <td scope="col"><input type="text" class="form-control" placeholder="GTP Oran" aria-label="Branche" aria-describedby="basic-addon1"></td>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection