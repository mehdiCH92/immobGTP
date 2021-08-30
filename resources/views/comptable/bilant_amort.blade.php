@extends('layouts.master')
@section('content')

<div class="container-fluid" >
<div class="container text-center">
    <h3><span class="badge badge-secondary text-center">Bilant generale des ammortisemment</span></h3>
    <strong style="color: #000;margin-top:10px;">Bilant de l'année des immobilisation en court</strong>
    
</div>

<div class="container-fluid" style="color: #000;margin-top:30px;">
  <button type="button" class="btn btn-info float-right btnprn" style="  margin-right: 10px;" ><a  href="{{url('print_bi')}}" style="color: #17202a;">Imprimer</a></button>
<table class="table table-bordered text-center">
    <thead>
      <tr class="border border-dark text-dark bg-secondary">
        <th >compte</th>
        <th >n°Iteme</th>
        <th style="width: 300px;" >designation</th>
        <th >code bare</th>
        <th >date aquisition</th>
        <th >date refer</th>
        <th >cout</th>
        <th >Amortissement</th>
        <th >VNC</th>
       
      </tr>
    </thead>
    <tbody style="background-color: #ccd1d1">
      @foreach ($im as $m )  
      <tr>
        <th scope="row">{{$m->num_comp_c}}</th>
        <th >{{$m->id}}</th>
        <th style="width: 300px;">{{$m->desingnation}}</th>
        <th >{{$m->code_bar}}</th>
        <th >{{$m->date_acc}}</th>
        <th >{{date('d F Y')}}</th>
        <th >{{$m->prix_acci}}</th>
        <th >{{$m->montant}}</th>
        <th >{{$m->vnc}}</th>
      
      </tr>
      @endforeach
   
    </tbody>
</table>


</div>
</div>
@endsection