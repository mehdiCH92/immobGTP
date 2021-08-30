@extends('layouts.master')
@section('content')
<div class="container">
    <button type="button" class="btn btn-info float-right"><a href="{{url('imp/'.$im->id)}}" style="color: #17202a;">Telecharger PDF</a></button>
    <button type="button" class="btn btn-info float-right btnprn" style="  margin-right: 10px;" ><a  href="{{url('prin/'.$im->id)}}" style="color: #17202a;">Imprimer</a></button>
        <div  class='container ' style="margin-top:100px;color: #17202a; border: 3px solid;padding: 50px;  font-family: Arial, Helvetica, sans-serif;">
            <div class='container'>
                <strong>ENGTP</strong>
                <strong class="float-right">Date :{{date('d F Y')}}</strong>
                <hr WIDTH="100%" SIZE="3" ALIGN="center">
                <hr WIDTH="100%" SIZE="3" ALIGN="center">
            </div>
            <div class='container'>

                <h2 class="text-center">FICHE D'INVESTISSEMENT</h2>
                <div class='row'>
                    <div class='col'>
                    <strong>Compte:{{$im->num_comp_c}}</strong>
                    </div>
                    <div class='col'>
                    <strong class="float-right">Situation:{{$im->situation}}</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                    <strong>N° item:{{$im->id}}</strong><br/>
                    <strong>Desgnation:{{$im->desingnation}}</strong>
                    </div>
                    <div class='col'>
                    <strong class="float-right">N° Inventaire:{{$im->num_inv}}</strong>
                    </div>
                </div>
                <hr WIDTH="100%" SIZE="20" ALIGN="center">   
            </div>
            <div class='container text-center'>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Comptabilisation:{{date('d F Y')}}</th>
                        <th scope="col">Acquisistion:{{$im->date_acc }}</th>
                        <th scope="col">Mise en Service:{{$im->date_acc }}</th>
                        <th scope="col">Effet:{{date('d F Y')}}</th>
                        </tr>
                    </thead>
                </table>
                <hr WIDTH="100%" SIZE="20" ALIGN="center">  
            </div>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                    <strong>Marque:{{$im->num_serie}}</strong>
                    </div>
                    <div class='col'>
                    <strong class="float-right">Type:{{$im->type_actif }}</strong>
                    </div>
                </div>
                    <div class='row'>
                        <div class='col'>
                        <strong>N° Serie:{{$im->num_serie}}</strong><br/>
                        
                        </div>
                        <div class='col'>
                        <strong class="float-right">N° Immatriculaation:{{$im->num_serie}}</strong>
                        </div>
                </div>
                    <hr WIDTH="100%" SIZE="20" ALIGN="center">   
                </div>
                <div class='container'>
                    <div class='row'>
                        <div class='col'>
                        <strong>Type Ammortisemment:linéair</strong><br/>
                        <strong>Type Entré:acquisition</strong>
                        </div>
                        <div class='col'>
                        <strong class="float-right">Taut Ammortissement:{{$im->taux_am}}</strong>
                        </div>
                    </div>
                    <hr WIDTH="100%" SIZE="20" ALIGN="center">   
                </div>
                <div class='container'>
                    <strong>Affectation:{{$im->service}}</strong>
                    <hr WIDTH="100%" SIZE="20" ALIGN="center">
                </div>
                <div class='container'>
                
                            <div style="width:500px;text-align:center;border: 2px dotted;margin-left:280px">
                            <h4>HISTORIQUE DES VALEURS D'ORIGINE</h4>
                            </div>
                        
                                <div class='container text-center' style="margin-top:20px;" >
                                        <table class="table border border-dark " >
                                                <tr>
                                                <th scope="col" style="border: 2px solid">date</th>
                                                <th scope="col" style="border: 2px solid">valeur brute</th>
                                                <th scope="col" style="border: 2px solid">observation</th> 
                                                <th scope="col" ></th>
                                                <th scope="col" style="border: 2px solid">date</th>
                                                <th scope="col" style="border: 2px solid">valeur brute</th>
                                                <th scope="col" style="border: 2px solid">observation</th>   
                                                </tr>
                                                <tr>
                                                <th scope="col" style="border: 2px solid"></th>
                                                <th scope="col" style="border: 2px solid"></th>
                                                <th scope="col" style="border: 2px solid"></th>
                                                <th scope="col" ></th>
                                                <th scope="col" style="border: 2px solid"></th>
                                                <th scope="col" style="border: 2px solid"></th>
                                                <th scope="col" style="border: 2px solid"></th>     
                                                </tr>
                                        </table>
                                </div>
                                <hr WIDTH="100%" SIZE="20" ALIGN="center">
        
                </div>
                <div class='container' style="border: 1px solid">
                
                    <div style="width:500px;text-align:center;border: 2px dotted;margin-left:280px">
                    <h4>TABLEAU DES AMORTISSEMENTS</h4>
                    </div>
            
                    <div class='container text-center' style="margin-top:20px;" >
                            <table class="table border border-dark " >
                                    <tr>
                                    <th scope="col" style="border: 2px solid">date comp</th>
                                    <th scope="col" style="border: 2px solid">date oper</th>
                                    <th scope="col" style="border: 2px solid">Montant</th> 
                                    <th scope="col" style="border: 2px solid" > cumule</th>
                                    <th scope="col" style="border: 2px solid">V.N.C</th>
                                    <th scope="col" style="border: 2px solid">Reste Ammortie</th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid">observation</th>    
                                    </tr>
                                 @foreach ($amor as $m)
                                 
                                    <tr>
                                    <th scope="col" style="border: 2px solid">{{$m->date_operation}}</th>
                                    <th scope="col" style="border: 2px solid">{{$m->date_operation}}</th>
                                    <th scope="col" style="border: 2px solid">{{$m->montant}}</th>
                                    <th scope="col" style="border: 2px solid" >//</th>
                                    <th scope="col" style="border: 2px solid">{{$m->vnc}}</th>
                                    <th scope="col" style="border: 2px solid">//</th>
                                    <th scope="col" style="border: 2px solid">//</th>
                                    <th scope="col" style="border: 2px solid">{{$m->observation}}</th>     
                                    </tr>
                                    @endforeach
                            </table>
                    </div>

                </div>
    </div>
                

       







</div>

<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
@endsection