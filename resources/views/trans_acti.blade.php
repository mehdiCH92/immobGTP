@extends('layouts.master')
@section('content')
<form>
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <thead>
    <tr style="text-align: center;">
      <td scope="col"></td>
      <th scope="col" style="float: right;">nom </th>
      <td scope="col"><input type="text" class="form-control" placeholder="nom" aria-label="l'annee" aria-describedby="basic-addon1">
      </td>
      <td scope="col"></td>

    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
  <td scope="col">classification</td>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
    </div>  
        <select class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
    </td>
     <td scope="col">classification trans</td>
        <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
    </div>  
        <select class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
    </td>
    </tr>
    <tr style="text-align: center;">
  <td scope="col"> sous classification</td>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
    </div>  
        <select class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
    </td>
     <td scope="col">sous classification trans</td>
        <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
    </div>  
        <select class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
    </td>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection