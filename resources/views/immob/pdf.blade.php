<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
    
</head>
<body  >
<div >
   
        <div  style="margin-top:20px;width:700px;border: 5px;border-style: solid;padding:10px;">
            <div>
                <strong>ENGTP</strong>
                <strong style="float: right;">Date :{{date('d F Y')}}</strong>
                <hr WIDTH="100%" SIZE="3" ALIGN="center">
                <hr WIDTH="100%" SIZE="3" ALIGN="center">
            </div>
            <div >

                <h2 style="text-align: center;">FICHE D'INVESTISSEMENT</h2>
                <div>
                    
                    
                    <strong style="float: right;">Situation:{{$im->situation}}</strong>
                    <strong>Compte:{{$im->num_comp_c}}</strong><br/>
                    <strong>N° item:{{$im->id}}</strong><br/>
                    <strong>Desgnation:{{$im->desingnation}}</strong>
                    <strong style="float: right;">N° Inventaire:{{$im->num_inv}}</strong>
                </div>
                <hr WIDTH="100%" SIZE="3" ALIGN="center">   
            </div>
            <div style="text-align: center;">
                <table style="width: 100%;border: 1px solid black;">
                    <thead>
                        <tr>
                        <th style="border: 1px solid black;width: 25%;">Comptabilisation:{{date('d F Y')}}</th>
                        <th style="border: 1px solid black;width: 25%;">Acquisistion:{{$im->date_acc }}</th>
                        <th style="border: 1px solid black;width: 25%;">M Service:{{$im->date_acc }}</th>
                        <th style="border: 1px solid black;width: 25%;">Effet:{{date('d F Y')}}</th>
                        </tr>
                    </thead>
                </table>
                <hr WIDTH="100%" SIZE="3" ALIGN="center">  
            </div>
            <div >
                    
                     <div style="display: inline-block;">
                    
                        <strong >Marque:{{$im->num_serie}}</strong><br/>
                        <strong >Type:{{$im->type_actif }}</strong>
                   
                    </div>
                    <div style="display: inline-block;float: right;">
                   
                        <strong >N° Serie:{{$im->num_serie}}</strong><br/>
                        <strong >N° Immatriculaation:{{$im->num_serie}}</strong>
                    </div>
                    
                  
                    <hr WIDTH="100%" SIZE="3" ALIGN="center">   
            </div>
            <div >
                    
                    <div style="display: inline-block;" >
                        <strong>Type Ammortisemment:linéair</strong><br/>
                        <strong>Type Entré:acquisition</strong>
                        </div>
                        <div style="display: inline-block;float: right;">
                        <strong >Taut Ammortissement:{{$im->taux_am}}</strong>
                        </div>
                   
                    <hr WIDTH="100%" SIZE="3" ALIGN="center">   
            </div>
                <div>
                    <strong>Affectation:{{$im->service}}</strong>
                    <hr WIDTH="100%" SIZE="3" ALIGN="center">
                </div>
                <div >
                
                        <div style="width:500px;text-align:center;border: 2px dotted;margin-left:120px">
                        <h4>HISTORIQUE DES VALEURS D'ORIGINE</h4>
                        </div>
                        
                                <div style="margin-top:20px;width:100%; " >
                                        <table style="width: 100%;border: 1px solid black;" >
                                                <tr>
                                                <th  style="border: 2px solid;width: 20%;">date</th>
                                                <th  style="border: 2px solid;width: 20%;">valeur brute</th>
                                                <th  style="border: 2px solid;width: 20%;">observation</th> 
                                                <th  ></th>
                                                <th  style="border: 2px solid;width: 20%;">date</th>
                                                <th  style="border: 2px solid;width: 20%;">valeur brute</th>
                                                <th  style="border: 2px solid;width: 20%;">observation</th>   
                                                </tr>
                                                <tr>
                                                <td  style="border: 2px solid;width: 20%;heigh:50%;"></td>
                                                <td  style="border: 2px solid;width: 20%;heigh:50%;"></td>
                                                <td  style="border: 2px solid;width: 20%;heigh:50%;"></td>
                                                <td  ></td>
                                                <td  style="border: 2px solid;width: 20%;heigh:50%;"></td>
                                                <td style="border: 2px solid;width: 20%;heigh:50%;"></td>
                                                <td  style="border: 2px solid;width: 20%;heigh:50%;"></td>     
                                                </tr>
                                        </table>
                                </div>
                                <hr WIDTH="100%" SIZE="3" ALIGN="center">
        
                </div>
                <div style="border: 1px solid">
                
                    <div style="width:500px;text-align:center;border: 2px dotted;margin-left:120px">
                    <h4>ABLEAU DES AMORTISSEMENTS</h4>
                    </div>
            
                    <div style="margin-top:20px;width:100%;" >
                            <table style="width: 100%;border: 1px solid black;" >
                                    <tr>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">date comp</th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">date oper</th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">Montant</th> 
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;" > cumule</th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">V.N.C</th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">Reste Ammortie</th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;"></th>
                                    <th  style="border: 2px solid;width: (100/8)%;text-align: center;">observation</th>    
                                    </tr>
                            @foreach ($amor as $m)
                                    <tr>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">{{$m->date_operation}}</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">{{$m->date_operation}}</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">{{$m->montant}}</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;" >//</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">{{$m->vnc}}</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">//</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">L</td>
                                    <td  style="border: 2px solid;width: (100/8)%;text-align: center;">{{$m->observation}}</td>     
                                    </tr>
                            @endforeach 
                            </table>
                    </div>

                </div>
    </div>
                

       







</div>

</body>
</html>