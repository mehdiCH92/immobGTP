@extends('layouts.master')
@section('content')
<div class="container" style="text-align: center;">
<h3><span class="badge bg-secondary">la sortie d'une immobilisation</span></h3>
</div>
<div class="container border border-dark" style="text-align: center;color:#000;margin-top:30px;background-color: #ccd1d1;">
<form action="{{ url('sortie/'.$lim->id) }}" method="POST">
{{csrf_field()}}
<table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">
      <label for="floatingInputValue">Numero de commition</label>
      <input type="text" name="numero_commition" class="form-control" id="floatingInputValue" placeholder="numero de commition">
      
      </th>
      <th scope="col">
      <label for="floatingInputValue">nom de commition</label>
      <input type="text" name="nom_commition" class="form-control" id="floatingInputValue" placeholder="nom de commition" >
     
      </th>
      <th scope="col">
      <label for="floatingInputValue">nombre de commition</label>
      <input type="text" name="nombre_de_commition" class="form-control" id="floatingInputValue" placeholder="nombre de commition" >
      
      </th>
      <th scope="col">
      <label for="floatingInputValue">seance</label>
      <input type="date" name="seance" class="form-control" id="floatingInputValue" placeholder="seance" >
      
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <label for="floatingInputValue">Unité</label>
      <input type="text" name="unite" class="form-control" id="floatingInputValue" placeholder="Unité" >
      </th>
      <th>
      <label for="inputGroupSelect01">Type de sortie</label>
            <select class="custom-select" name="type_sortie"  id="inputGroupSelect01">
            <option selected value="Destruction">Destruction</option>
                <option value="gratieux">gratieux</option>
                <option value="onereux">onereux</option>
                <option value="Vol">Vol</option>
                <option value="disparition">disparition</option>
                <option value="incendie">incendie</option>
              
                                                                                
            </select>
            
        </th>
      <th colspan="3"><span class="badge bg-secondary">la cause de reformme</span><br/>{{$pv->description}}</th>
    </tr>
    <tr>
      <th scope="row">
      <label for="floatingInputValue">Numero dosier</label>
      <input type="text" name="num_dossier" class="form-control" id="floatingInputValue" placeholder="Numero dosier" >
      </th>
      <th><label for="floatingInputValue">Desision</label>
      <input type="text" name="desition" class="form-control" id="floatingInputValue" placeholder="Desision" ></th>
      <th colspan="3"><span class="badge bg-secondary">description detat de l'immobilisation</span><br/>{{$lim->descEtat}}</th>
      
    </tr>
    <tr>
     
      <td colspan="4">
      <div class="form-group">
      <h5><span class="badge bg-secondary">Description finale de sortir</span></h5>
     <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      </td>
      
    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">OK</button></div>
</form>
</div>
@endsection