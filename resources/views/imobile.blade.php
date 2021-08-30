@extends('layouts.master')
@section('content')
<form>
<div class="container" style="margin-top: 40px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000; ">
  <thead>
    <tr style="text-align: center;">
      <th>N° imobilisation</th>
      <td scope="col">2001</td>
      <th>N ° d'enregistrement</th>
      <td scope="col">3000</td>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
      <th>nom de l'imobilisation</th>
      <td scope="col"><input type="text" class="form-control" placeholder="nom de l'imobilisation" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>la Branche </th>
      <td scope="col"><input type="text" class="form-control" placeholder="Branche " aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
    <tr style="text-align: center;">
      <th>classification principale </th>
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
      <th>Lieu d'imobilisation </th>
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
      <th>Sous-classification </th>
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
    </div></td>
      <th>date d'achat</th>
      <td scope="col"><input class="form-control" type="date" value="yyyy-mm-dd"></td>
    </tr>
    <tr style="text-align: center;">
      <th>prix d'achat </th>
            <td scope="col">    
       <div class="input-group mb-3">
  <div class="input-group-prepend">

  </div>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">DZ</span>
  </div>
</div></td>
      <th>Dépréciation </th>
      <td scope="col"> <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">%</span>
  </div>
</div></td>
    </tr  >
        <tr style="text-align: center;">
      <th>Quantité  </th>
            <td scope="col"> <input type="text" class="form-control" placeholder="Quantité" aria-label="Quantité" aria-describedby="basic-addon1">   </td>
      <th>année fiscale </th>
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
      <th>prix totale</th>
      <td scope="col">2001</td>
      <th>somme Dépréciation </th>
      <td scope="col">3000</td>
    </tr>
  
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection

