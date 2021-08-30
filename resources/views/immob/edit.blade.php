@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center">Modifier L'immobilisation: {{$im->desingnation}} </span></h2>
  </div>
@if(count($errors))
  <div class="alert alert-danger" role="alert">
      <ul>
        @foreach($errors->all() as $mes)
        <li>{{$mes}}</li>
        @endforeach
      </ul>
  </div>
@endif

<form action="{{ url('immob/'.$im->id) }}" method="POST">

{{csrf_field()}}
<input type="hidden" name="_method" value="PUT">
<div class="container" style="margin-top: 40px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000; ">
  <thead>
    <tr style="text-align: center;">
      <th>N° Compte comptable</th>
      <td scope="col"><input type="text" name="compte_comp" class="form-control"  value="{{$im->num_comp_c}}" aria-label="N compte" aria-describedby="basic-addon1"></td>
      <th>code bare</th>
      <td scope="col"><input type="text" name="code_bare" class="form-control" value="{{$im->code_bar}}" aria-label="code bare" aria-describedby="basic-addon1"></td>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
      <th>nom de l'imobilisation</th>
      <td scope="col"><input type="text" name="nome_immob" class="form-control" value="{{$im->code_bar}}" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>code comptable </th>
      <td scope="col"><input type="text" name="code_comp" class="form-control" value="{{$im->code_comptable}}"  aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
    <tr style="text-align: center;">
      <th>Service </th>
      <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="service" id="inputGroupSelect01">
    <option selected value="{{$im->service}}">{{$im->service}}</option>
    <option value="informatique">informatique</option>
    <option value="comptabilité">comptabilité</option>
    <option value="DCL">DCL</option>
  </select>
</div>
    </td>
      <th>Localisation </th>
      <td scope="col"> 
              <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>   
    <select class="custom-select" name="localisation" id="inputGroupSelect01">
    <option selected value="{{$im->localisation}}">{{$im->localisation}}</option>
    <option value="1">Alger</option>
    <option value="2">hasi meseoude</option>
    <option value="3">oran</option>
  </select>
</div>
</td>
    </tr>
    <tr style="text-align: center;">
      <th>Type Immobilisation </th>
            <td scope="col">
                    <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>    
        <select class="custom-select" name="type_immo" id="inputGroupSelect01">
        <option selected value="{{$im->type_actif}}">{{$im->type_actif}}</option>
        <option value="ammortissable">ammortissable</option>
        <option value="non ammortisable">non ammortisable</option>
        
      </select>
    </div></td>
      <th>date d'accisition</th>
      <td scope="col"><input class="form-control" type="date" name="date_acc" value="{{$im->date_acc}}"></td>
    </tr>
    <tr style="text-align: center;">
      <th>prix d'accisition </th>
            <td scope="col">    
       <div class="input-group mb-3">
  <div class="input-group-prepend">

  </div>
  <input type="text" name="prix_acc" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$im->prix_acci}}">
  <div class="input-group-append">
    <span class="input-group-text">DZ</span>
  </div>
</div></td>
      <th>TVA </th>
      <td scope="col"> <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" name="TVA" class="form-control" aria-label="" value="{{$im->TVA}}">

</div></td>
    </tr  >
    <tr style="text-align: center;">
      <th>HORE TAX</th>
      <td scope="col"><input type="text"  name="hore_tax" class="form-control" value="{{$im->HOR_TAX}}" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>TTC </th>
      <td scope="col"><input type="text" name="TTC" class="form-control" value="{{$im->TTC}}" aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
</div>
    </td>
    </tr>
        <tr style="text-align: center;">
      <th>numero pv reception  </th>
            <td scope="col"> <input type="text" name="pv_recep" class="form-control" value="{{$im->num_pv_rec}}" aria-label="Quantité" aria-describedby="basic-addon1">   </td>
      <th>Situation </th>
            <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="situation" id="inputGroupSelect01">
    <option selected value="{{$im->situation}}">{{$im->situation}}</option>
    <option value="1">non réformé</option>
    <option value="2">réformé</option>
    
  </select>
  </tr>
  <tr style="text-align: center;">
      <th>numero serie</th>
      <td scope="col"><input type="text" name="num_serie" class="form-control" value="{{$im->num_serie}}" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>numero pv codification </th>
      <td scope="col"><input type="text" name="pv_cod" class="form-control" value="{{$im->num_pv_cod}}" aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
</div>
    </td>
    </tr>
 

  
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Modifier</button></div>
</div>
</form>
@endsection
