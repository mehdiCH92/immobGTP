<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>
<body style="background-color:  #f8f9f9 ;color: #ffffff;text-decoration-color:#ffffff; font-family: Palatino;" >

<div class="container">
    
<button type="button" class="btn btn-info float-right btnprn" id="bt" onclick="imprimer_page()"><a style="color: #17202a;">Imprimer</a></button><br/>
        <div  class='container ' style="margin-top:100px;color: #17202a; border: 3px solid;padding: 5px;  font-family: Arial, Helvetica, sans-serif;">
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
                    <h4>ABLEAU DES AMORTISSEMENTS</h4>
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
                                    <tr>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid" ></th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid"></th>
                                    <th scope="col" style="border: 2px solid"></th>     
                                    </tr>
                            </table>
                    </div>

                </div>
    </div>
                

       







</div>

<script type="text/javascript">
 
function imprimer_page(){
    $( "#bt" ).hide();
  window.print();
}
</script>
</body>
</html>