@extends('layouts.master')
@section('content')

<div class="container text-center" id="dex" style="color:#000000">
  <form action="{{ url('excelc') }}" method="POST" style="margin-top=0px" enctype='multipart/form-data' >
  {{csrf_field()}}
  <h3>importer un fichier excel:</h3>
  <label for="imp"></label>
  
  <input type="file" id="imp" name="select" class="d-inline">
  <div class="btns"> <button type="submit" class="btn btn-outline-danger d-inline" style="float: right; margin-top: 0px;width:100px; ">Importer</button></div>
  
  
  </form>
  <br/>
  <hr/>
  </div>
  
    <div class="container-fluid" style="margin-top: 30px;color:#000;" id="conttab">

      <table class="table table-striped indtab text-center">
      <thead>
        <tr  class="border border-dark text-dark bg-secondary" >
          <th class="border border-dark">compte comptable</th>
                                    <th class="border border-dark">code comptable</th>
          <th class="border border-dark">desingnation</th>
          <th class="border border-dark">service</th>
          <th class="border border-dark">date accisition</th>
          <th class="border border-dark">prix aquisition</th>
                                    <th class="border border-dark">TVA</th>
          <th class="border border-dark">TTC</th>
          <th class="border border-dark">HOR TAX </th>
          
          
        </tr>
      </thead>
         <tbody style="background-color: #ccd1d1">
          @foreach($im as $l)
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
        
          
          </tr>
          @endforeach
        </tbody>		
      </table>

    </div>
  
@endsection