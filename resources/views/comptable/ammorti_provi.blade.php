@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center" > Ammortissment provisoire </span></h2>
  </div>
<form action="{{url('calcamPro')}}" method="POST">
  {{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
 <div class="container">
  <table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
    <thead>
      <tr style="text-align: center;">
        <td colspan="4">
          <label for="floatingInputValue">Année</label>
          <input type="text" name="Annee" class="form-control" id="floatingInputValue" placeholder="Année" >
        </td>
      </tr>
    </thead>
    <tbody>
      <tr style="text-align: center;">  
      <td colspan="2"> <label for="floatingInputValue">commence a</label><input class="form-control" name="commance" type="date" value="yyyy-mm-dd"></td>
      <td colspan="2"><label for="floatingInputValue">terminer a</label><input class="form-control" name="termine"  type="date" value="yyyy-mm-dd"></td>
      </tr>
    </tbody>
  </table>
 </div>
 
<!--  <div class="container">
   
  <table class="table table-bordered" style="margin-top:30px;border-style: solid;color:#000000">
  <thead>
    <tr>
      
      <th scope="col" class="text-center" id="e1">      
        <label for="floatingInputValue" class="text-center">selectionner par compte comptable</label>
        <input type="text" name="numero_commition" class="form-control" id="compte_cI" placeholder="compte comptable">
        <button type="button" class="btn btn-info float-right" id="compte_c">selectioner </button>
      </th>
      <th scope="col" class="text-center">
        <label for="floatingInputValue" class="text-center">selectionner par code comptable</label>
        <input type="text" name="numero_commition" class="form-control" id="code_comptable" placeholder="code comptable">
        <button type="button" class="btn btn-info float-right" id="code_co">selectioner</button>
      </th>
      <th scope="col" class="text-center">
        <label for="floatingInputValue" class="text-center">selectionner par code bare</label>
        <input type="text" name="numero_commition" class="form-control" id="code_bare" placeholder="code bare">
        <button type="button" class="btn btn-info float-right" id ="code_b">selectioner</button>
      </th>
    </tr>
  </thead>
</table>

   
 </div> -->

<div class="container" style="margin-top: 30px;color:#000000">

    <table class="table table-striped indtab text-center" id="tableux">
    <thead>
        <tr  class="border border-dark text-dark bg-secondary" >
          <th class="border border-dark">ID</th>
            <th class="border border-dark">compte comptable</th>
            <th class="border border-dark">code comptable</th>
            <th class="border border-dark">desingnation</th>
            <th class="border border-dark">Code bare</th>
            <th class="border border-dark">date accisition</th>
            <th class="border border-dark">prix aquisition</th>
            <th class="border border-dark">TVA</th>
            <th class="border border-dark">TTC</th>
            <th class="border border-dark">HOR TAX </th>
            
            <th class="text-center border border-dark">Selectioner Tout <br/> <input type="checkbox" name="toutactions" /> </th>
        </tr>
    </thead>
    <tbody style="background-color: #ccd1d1">
     
     @foreach ($lim as $l) 
     <tr class="border border-dark">
            <td class="border border-dark num_compte" id="id">{{$l->id}}</td>

            <td class="border border-dark num_compte" id="num_compte">{{$l->num_comp_c}}</td>
            <td class="border border-dark" id="code_compt">{{$l->code_comptable}}</td>
            <td class="border border-dark">{{$l->desingnation}}</td>
            <td class="border border-dark" id="code_ba">{{$l->code_bar}}</td>
            <td class="border border-dark">{{$l->date_acc}}</td>
            <td class="border border-dark">{{$l->prix_acci}}</td>
            <td class="border border-dark">{{$l->TVA}}</td>
            <td class="border border-dark">{{$l->TTC}}</td>
            <td class="border border-dark">{{$l->HOR_TAX}}</td>
            <td style='display: inline-block;'><div class="form-check"><input class="form-check-input cocher" type="checkbox" value="0" name="action[]" id="chek" /></div></td>
      
          </tr>     
      @endforeach
    </tbody>		
    </table>

</div>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 100px;">Calculer</button></div>
</div>
</form>


<script type="text/javascript">
  $('input[name=toutactions]').click(function()
  
  {
      var cocher = this.checked;
      $('input[name="action[]"]:enabled').each(function()
      {
          this.checked = cocher;
          this.value = "1";
      })
  
  });
</script> 

<script type="text/javascript">   
 
  $("#compte_c").click(function(){
    var t =[];
    var td = document.querySelectorAll('td input');
      var compte_cI = $("#compte_cI").val();
      $('#tableux').find("tbody").find("tr").each(function(){
         var num_compte= $(this).find("#num_compte").text();

              t.push(num_compte);
      });

      for(var i=0;i<t.length;i++)
      {
        if(t[i] == compte_cI )
        {
          td[i].checked=true;
          
        }
      }

     
     
  });


  $("#code_co").click(function(){
    var t =[];
    var td = document.querySelectorAll('td input');
      var code_co = $("#code_comptable").val();
      $('#tableux').find("tbody").find("tr").each(function(){
         var num_compte= $(this).find("#code_compt").text();

              t.push(num_compte);
      });

      for(var i=0;i<t.length;i++)
      {
        if(t[i] == code_co )
        {
          td[i].checked=true;
          
        }
      }

     
     
  });
    

  
  $("#code_b").click(function(){
    var t =[];
    var td = document.querySelectorAll('td input');
      var code_bar = $("#code_bare").val();
      $('#tableux').find("tbody").find("tr").each(function(){
         var num_compte= $(this).find("#code_ba").text();

              t.push(num_compte);
      });

      for(var i=0;i<t.length;i++)
      {
        if(t[i] == code_bar )
        {
          td[i].checked=true;
         
        }
      }

     
     
  });

  </script>

  @endsection