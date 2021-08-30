@extends('layouts.master')
@section('content')
<div class='container' >
@if(!empty($err))
<div class="alert alert-danger" role="alert">
  <h3>{{$err}}</h3>
</div>
@endif
@if((Auth::user()->role == 'structure'))
<div class="container text-center">
    <h2><span class="badge badge-secondary text-center">Ajouter une immobilisation </span></h2>
</div>
@else
<div class="container text-center">
    <h2><span class="badge badge-secondary text-center">Remplire les champ comptabilité d' immobilisation </span></h2>
</div>
@endif
@if((Auth::user()->role == 'structure')or(Auth::user()->role == 'Admin'))
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active"><button type="button" class="btn btn-primary" id="aquisition1">Immobilisation</button></a>
  </li>

  <li class="nav-item">
    <a class="nav-link " ><button type="button" class="btn btn-primary" id="excel">importer excel</button>
  </li>
 
</ul>
@endif



<div class="container-fluid text-center" id="dex" style="color:#000000">
<form action="{{ url('excel') }}" method="POST" style="margin-top=0px" enctype='multipart/form-data' >
{{csrf_field()}}
<label for="avatar">importer un fichier excel:</label>

<input type="file" id="avatar" name="select" class="d-inline"  >
<div class="btns"> <button type="submit" class="btn btn-outline-danger d-inline" style="float: right; margin-top: 0px;width:100px; ">Importer</button></div>


</form>
<br/>
<hr/>
</div>



<div class="container-fluid" style="margin-top: 30px;color:#000;" id="conttab">

											<table class="table table-striped indtab text-center">
											<thead>
												<tr  class="border border-dark text-dark bg-secondary" >
													<th class="border border-dark">Compte comptable</th>
                                                    <th class="border border-dark">Code comptable</th>
													<th class="border border-dark">Desingnation</th>
													<th class="border border-dark">Service</th>
													<th class="border border-dark">Date accisition</th>
													<th class="border border-dark">Prix accisition</th>
                                                    <th class="border border-dark">TVA</th>
													<th class="border border-dark">Montant TTC</th>
													<th class="border border-dark">Montant HT </th>
													
													<th class="text-center border border-dark">Action</th>
												</tr>
											</thead>
                                            <tbody style="background-color: #ccd1d1">
                                            @foreach($lim as $l)
													<tr class="border border-dark">
													<td class="border border-dark" >{{$l->num_comp_c}}</td>
													<td class="border border-dark">{{$l->code_comptable}}</td>
													<td class="border border-dark">{{$l->desingnation}}</td>
													<td class="border border-dark">{{$l->service}}</td>
													<td class="border border-dark">{{$l->date_acc}}</td>
													<td class="border border-dark">{{$l->prix_acci}}</td>
                                                    <td class="border border-dark">{{$l->TVA}}</td>
													<td class="border border-dark">{{$l->TTC}}</td>
													<td class="border border-dark">{{$l->HOR_TAX}}</td>
												
													<td style='display: inline-block;'>@if(empty($l->TVA) AND ((Auth::user()->role == 'c_immob') or (Auth::user()->role == 'Admin')) )<a href="{{ url('immob_e/'.$l->id) }}" id="comptable"><button type="button" class="btn btn-primary container-fluid" >comptabilité</button></a>@else<p>-</p>@endif</td>
													</tr>
                                            @endforeach
                                            </tbody>		
											</table>

										</div>


<div class="container text-center" id="container1">

<div class="alert alert-warning text-center" role="alert">
  Tout les champ en rouge sant obligatoire 
</div>

<form action="{{ url('imobb') }}" method="POST" style="margin-top=0px">
            {{csrf_field()}}
            <input id="prodId" name="compte_comp" type="hidden" value="0">
            <input id="prodId" name="code_comp" type="hidden" value="0">
            <input id="prodId" name="TVA" type="hidden" value="0">
            <input id="prodId" name="type_immo" type="hidden" value="null">
            <input id="prodId" name="TTC" type="hidden" value="0">
            <input id="prodId" name="hore_tax" type="hidden" value="0">
            <input id="prodId" name="situation" type="hidden" value="null">
            <input id="prodId" name="inv" type="hidden" value="000">
            <input id="prodId" name="T_am" type="hidden" value="00">

                                                                        <table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000; ">
                                                                        <thead>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">numero serie</th>
                                                                        <th colspan="2">numero matricule </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                           
                                                                            <td colspan="2"><input type="text"  id="num_serie" name="num_serie" value="{{old('num_serie')}}" class="form-control" placeholder="numero serie" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
                                                     
                                                                            <td colspan="2"><input type="text" id="num_mat" name="num_mat" value="{{old('pv_cod')}}" class="form-control" placeholder="numero de matricule " aria-label="Branche " aria-describedby="basic-addon1"></td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2" id="code_ba">code bare</th>
                                                                        <th colspan="2" id="code_bare" style="color: red;">
                                                                           le code à barre est obligatoire!!     
                                                                        </th>
                                                                        <th colspan="2" id="num_in">numero invrntaire </th>
                                                                        <th colspan="2" id="num_inv" style="color: red;">
                                                                            le numero inventaire est obligatoire!!     
                                                                         </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                                
                                                                                    <td colspan="2">
                                                                                        <input type="text" name="code_bare" id="code_b" required value="{{old('code_bare')}}" class="form-control" placeholder="code bare" aria-label="code bare" aria-describedby="basic-addon1">
                                                                                        
                                                                                    </td>
                                                        
                                                                                        <td colspan="2"> <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                    </div>
                                                                                    <input type="text" name="inv" id="inv" required  value="{{old('inv')}}" class="form-control" aria-label="" placeholder="numero inventaire">
                                                                                    </div></td>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">nom de l'imobilisation</th>
                                                                        <th colspan="2">Type Entré </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                            
                                                                            <td colspan="2"><input type="text" name="nome_immob" required style="border-color: #800000;" style="border-color: #800000;" class="form-control" placeholder="nom de l'imobilisation" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1">
                                                                              
                                                                                        <td colspan="2">
                                                                                    <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                
                                                                            </div>  
                                                                                <select class="custom-select" name="entre"  required style="border-color: #800000;" id="inputGroupSelect01">
                                                                                
                                                                                <option value="achat">achat</option>
                                                                                <option value="gratuit">gratuit</option>
                                                                                <option value="construit">construit</option>
                                                                                
                                                                            </select>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">Derection</th>
                                                                        <th colspan="2">Localisation </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                            
                                                                            <td colspan="2">
                                                                                <div class="input-group mb-3">
                                                                                <div class="input-group-append">
                                                                            <span class="input-group-text"><a href="{{url('derection')}}">+</a></span>
                                                                        </div>  
                                                                            <select class="custom-select" name="derection" required style="border-color: #800000;" id="inputGroupSelect01">
                                                                            <option selected >Choose...</option>
                                                                            @foreach($der as $ds)
                                                                            <option value="{{$ds->derection}}">{{$ds->derection}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        </div>
                                                                            </td>
                                                                            
                                                                            <td colspan="2"> 
                                                                                    <div class="input-group mb-3">
                                                                                <div class="input-group-append">
                                                                            <span class="input-group-text"><a href="{{url('branch')}}">+</a></span>
                                                                        </div>   
                                                                            <select class="custom-select"  name="localisation" required style="border-color: #800000;" id="inputGroupSelect01">
                                                                            <option selected >Choose...</option>
                                                                            @foreach($br as $b)
                                                                            <option value="{{$b->branche}}">{{$b->branche}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        </div>
                                                                        </td>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">service</th>
                                                                        <th colspan="2">date d'accisition </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        
                                                                            <td colspan="2"> 
                                                                                    <div class="input-group mb-3">
                                                                                <div class="input-group-append">
                                                                            <span class="input-group-text"><a href="{{url('service')}}">+</a></span>
                                                                        </div>   
                                                                            <select class="custom-select" value="{{old('service')}}" name="service" required style="border-color: #800000;" id="inputGroupSelect01">
                                                                            <option selected value="{{old('service')}}">Choose...</option>
                                                                            @foreach($ser as $s)
                                                                            <option value="{{$s->service}}">{{$s->service}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        </div>
                                                                        </td>
                                                                       
                                                                        <td colspan="2"><input class="form-control" type="date" name="date_acc" required style="border-color: #800000;" value="{{old('date_acc')}}" value="yyyy-mm-dd"></td>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">prix d'accisition</th>
                                                                        <th colspan="2">numero pv reception </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                            
                                                                                    <td colspan="2">    
                                                                            <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">

                                                                        </div>
                                                                        <input type="text" name="prix_acc" required style="border-color: #800000;" class="form-control"  placeholder="prix d'accisition">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">DZ</span>
                                                                        </div>
                                                                        </div></td>
                                                                       
                                                                        <td colspan="2"> <input type="text" name="pv_recep" required style="border-color: #800000;" value="{{old('pv_recep')}}" class="form-control" placeholder="numero pv reception" aria-describedby="basic-addon1">   </td>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">numero pv codification</th>
                                                                        <th colspan="2">marque </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        
                                                                        <td colspan="2"><input type="text" name="pv_cod"  class="form-control" placeholder="numero pv codification " aria-label="Branche " aria-describedby="basic-addon1"></td>
                                                                       
                                                                        <td colspan="2"> 
                                                                            <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                    <span class="input-group-text"><a href="{{url('marque')}}">+</a></span>
                                                                            </div>   
                                                                                <select class="custom-select"  name="marque" required style="border-color: #800000;" id="inputGroupSelect01">
                                                                                <option selected >Choose...</option>
                                                                                @foreach($mar as $b)
                                                                                <option value="{{$b->marque}}">{{$b->marque}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">contité</th>
                                                                        <th colspan="2">fourniseur</th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                        <td colspan="2"><input type="text" name="contite" required style="border-color: #800000;" class="form-control" placeholder="numero pv codification " aria-label="Branche " aria-describedby="basic-addon1"></td>
                                                                        <td colspan="2"> 
                                                                            <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                    <span class="input-group-text"><a href="{{url('fourniseur')}}">+</a></span>
                                                                            </div>   
                                                                                <select class="custom-select"  name="fourniseur" required style="border-color: #800000;" id="inputGroupSelect01">
                                                                                <option selected >Choose...</option>
                                                                                @foreach($mar as $b)
                                                                                <option value="{{$b->marque}}">{{$b->marque}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            </div>
                                                                            </td>    
                                                                    
                                                                    </tr>
                                                                        </tbody>
                                                                        </table>
                                                                        <div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">OK</button></div>
                                                                        
        </form>   

</div>




<script>
 $( "#container1" ).hide();
$( "#aquisition1" ).click(function() {
    $( "#conttab" ).hide();
    $( "#container3" ).hide();
    $( "#dex" ).hide();
  $( "#container1" ).show( "slow", function() {
    // Animation complete.
  });
});


$( "#dex" ).hide();
$( "#excel" ).click(function() {
    //$( "#conttab" ).hide();
  $( "#dex" ).show( "slow", function() {
    
    // Animation complete.
  });
});

$("#code_bare" ).hide();
$("#code_b" ).click(function() {
  $("#code_ba").hide();
  $("#num_inv" ).hide();
  $("#num_in" ).show();
  $("#code_bare").show( "slow", function() {
    // Animation complete.
  });
});

$("#num_inv" ).hide();
$("#inv" ).click(function() {
  $("#num_in").hide();
  $("#code_bare" ).hide();
  $("#code_ba").show();
  $("#num_inv").show( "slow", function() {
    // Animation complete.
  });
});

</script>






@endsection