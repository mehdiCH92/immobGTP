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

    <div class="container-fluid" >
        <div class="container text-center">
            <h3><span class="badge badge-secondary text-center">Bilant generale des ammortisemment</span></h3>
            <strong style="color: #000;margin-top:10px;">Bilant de l'année {{date("Y",strtotime(date('d F Y')))}}</strong>
            
        </div>
        
        <div class="container-fluid" style="color: #000;margin-top:30px;">
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



<script>
window.onload = function(){
    window.print();
}
</script>



<script type="text/javascript">
 
        function imprimer_page(){
            $( "#bt" ).hide();
          window.print();
        }
</script>
</body>
</html>