@extends('layouts.master')
@section('content')
<!--@if(count($errors))
  <div class="alert alert-danger" role="alert">
      <ul>
        @foreach($errors->all() as $mes)
        <li>{{$mes}}</li>
        @endforeach
      </ul>
  </div>
@endif-->
<div class='container' >
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  </li>
</ul>
<form action="{{ url('imob') }}" method="POST" style="margin-top=0px">
{{csrf_field()}}
<div class="container" style="margin-top: 40px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000; ">
  <thead>
    <tr style="text-align: center;">
      <th>N° Compte comptable</th>
      <td scope="col"><input type="text" name="compte_comp" value="{{old('compte_comp')}}" class="form-control" placeholder="compte coptable" aria-label="N compte" aria-describedby="basic-addon1">
      @if ($errors->has('compte_comp'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('compte_comp') }}</strong>
                                    </span>
      @endif
      </td>
      <th>code bare</th>
      <td scope="col"><input type="text" name="code_bare" value="{{old('code_bare')}}" class="form-control" placeholder="code bare" aria-label="code bare" aria-describedby="basic-addon1">
      @if ($errors->has('code_bare'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('code_bare') }}</strong>
                                    </span>
      @endif
      </td>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
      <th>nom de l'imobilisation</th>
      <td scope="col"><input type="text" name="nome_immob" value="{{old('nome_immob')}}" class="form-control" placeholder="nom de l'imobilisation" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1">
      @if ($errors->has('nome_immob'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('nome_immob') }}</strong>
                                    </span>
      @endif
      </td>
      <th>code comptable </th>
      <td scope="col"><input type="text" name="code_comp" value="{{old('code_comp')}}" class="form-control" placeholder="code comptable " aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
    <tr style="text-align: center;">
      <th>Derection </th>
      <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="derection" value="{{old('derection')}}" id="inputGroupSelect01">
    <option selected value="{{old('derection')}}">Choose...</option>
    @foreach($der as $ds)
    <option value="{{$ds->derection}}">{{$ds->derection}}</option>
    @endforeach
  </select>
</div>
    </td>
      <th>Localisation </th>
      <td scope="col"> 
              <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>   
    <select class="custom-select" value="{{old('localisation')}}" name="localisation" id="inputGroupSelect01">
    <option selected value="{{old('localisation')}}">Choose...</option>
    @foreach($br as $b)
    <option value="{{$b->branche}}">{{$b->branche}}</option>
    @endforeach
  </select>
</div>
</td>
<tr style="text-align: center;">
<th>service </th>
      <td scope="col"> 
              <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>   
    <select class="custom-select" value="{{old('service')}}" name="service" id="inputGroupSelect01">
    <option selected value="{{old('service')}}">Choose...</option>
    @foreach($ser as $s)
    <option value="{{$s->service}}">{{$s->service}}</option>
    @endforeach
  </select>
</div>
</td>

<th>numero invrntaire </th>
      <td scope="col"> <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" name="inv" value="{{old('inv')}}" class="form-control" aria-label="" placeholder="numero inventaire">

</div></td>




</tr>
    </tr>
    <tr style="text-align: center;">
      <th>Type Immobilisation </th>
            <td scope="col">
                    <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>    
        <select class="custom-select" name="type_immo" value="{{old('type_immo')}}" id="inputGroupSelect01">
        <option selected value="{{old('type_immo')}}">Choose...</option>
        <option value="ammortissable">ammortissable</option>
        <option value="non ammortisable">non ammortisable</option>
        
      </select>
    </div></td>
      <th>date d'accisition</th>
      <td scope="col"><input class="form-control" type="date" name="date_acc" value="{{old('date_acc')}}" value="yyyy-mm-dd"></td>
    </tr>
    <tr style="text-align: center;">
      <th>prix d'accisition </th>
            <td scope="col">    
       <div class="input-group mb-3">
  <div class="input-group-prepend">

  </div>
  <input type="text" name="prix_acc" value="{{old('prix_acc')}}" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="prix d'accisition">
  <div class="input-group-append">
    <span class="input-group-text">DZ</span>
  </div>
</div></td>
      <th>TVA </th>
      <td scope="col"> <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" name="TVA" value="{{old('TVA')}}" class="form-control"  placeholder="TVA">

</div></td>
    </tr  >
    <tr style="text-align: center;">
      <th>HORE TAX</th>
      <td scope="col"><input type="text"  name="hore_tax" value="{{old('hore_tax')}}" class="form-control" placeholder="HORE TAX" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>TTC </th>
      <td scope="col"><input type="text" name="TTC" value="{{old('TTC')}}" class="form-control" placeholder="TTC " aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
</div>
    </td>
    </tr>
        <tr style="text-align: center;">
      <th>numero pv reception  </th>
            <td scope="col"> <input type="text" name="pv_recep" value="{{old('pv_recep')}}" class="form-control" placeholder="numero pv reception" aria-label="Quantité" aria-describedby="basic-addon1">   </td>
      <th>Situation </th>
            <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="situation" value="{{old('situation')}}" id="inputGroupSelect01">
    
    <option value="1">non réformé</option>
    <option value="2">réformé</option>
    
  </select>
  </tr>
  <tr style="text-align: center;">
      <th>numero serie</th>
      <td scope="col"><input type="text" name="num_serie" value="{{old('num_serie')}}" class="form-control" placeholder="numero serie" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
      <th>numero pv codification </th>
      <td scope="col"><input type="text" name="pv_cod" value="{{old('pv_cod')}}" class="form-control" placeholder="numero pv codification " aria-label="Branche " aria-describedby="basic-addon1"></td>
    </tr>
</div>
<tr style="text-align: center;">
      <th>Type Entré </th>
            <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="entre" value="{{old('entre')}}" id="inputGroupSelect01">
    
    <option value="achat">achat</option>
    <option value="gratuit">gratuit</option>
    <option value="construit">construit</option>
    
  </select>
  <th>numero matricule </th>
      <td scope="col"><input type="text" name="num_mat" value="{{old('num_mat')}}" class="form-control" placeholder="numero pv codification " aria-label="Branche " aria-describedby="basic-addon1"></td>
  </tr>
  <tr style="text-align: center;">
      
  <th>taux ammortisemment  </th>
  <td scope="col">    
       <div class="input-group mb-3">
  <div class="input-group-prepend">

  </div>
  <input type="text" name="T_am" value="{{old('T_am')}}" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="taux ammortisemment">
  <div class="input-group-append">
    <span class="input-group-text">%</span>
  </div>
</div></td>
  </tr>

  
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">OK</button></div>
</div>
</form>
</div>
@endsection
