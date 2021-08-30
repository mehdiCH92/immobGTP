@extends('layouts.master')
@section('content')
<div class="container text-center">
  <h2><span class="badge badge-secondary text-center">Trnsférer l'immobilisation: {{$im->desingnation}} code bare : {{$im->code_bar}} </span></h2>
</div>
<form action="{{ url('bd/'.$im->id) }}" method="POST" style="margin-top=0px" enctype='multipart/form-data'>
{{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped indtab text-center" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody style="background-color: #ccd1d1">
    <tr style="text-align: center;">
      <th> Nome de immobilisation </th>
	  <th> {{$im->desingnation}} </th>
   <th> Localisation  </th>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" id="inputGroupSelect01" name="localisation">
    @foreach($br as $b)
    <option value="{{$b->branche}}">{{$b->branche}}</option>
	@endforeach

  </select>
</div>
    </td>
    </tr>
    <tr style="text-align: center;">
    <th> Derection </th>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" id="inputGroupSelect01" name="derection">
	@foreach($der as $b)
    <option value="{{$b->derection}}">{{$b->derection}}</option>
	@endforeach
  </select>
</div>
    </td>
    <th> Service </th>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" id="inputGroupSelect01" name="service">
	@foreach($ser as $b)
    <option value="{{$b->service}}">{{$b->service}}</option>
	@endforeach
  </select>
</div>
    </td> 
    </tr>
    <tr>
    <th> Etat de l'immobilisation</th>
    <td colspan="4">   <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" id="inputGroupSelect01" name="etat">	
    <option value="nouveaux">nouveaux</option>
    <option value="en panne">en panne</option>
    <option value="casser">casser</option>
  </select>
  </div></td>
    </tr>
    <tr>
    <th>Description de letat de l'immobilisation</th>
    <td colspan="4">  
    <div class="form-outline">
    <textarea class="form-control" name="descetat" id="textAreaExample1" rows="4"></textarea>
    
    </div>      
    </td>
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
@endsection