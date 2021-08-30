@extends('layouts.master')
@section('content')
<div class="container text-center" id="container2">

<form action="{{ url('iob/'.$m->id) }}" method="POST" style="margin-top=0px">
{{csrf_field()}}
<input type="hidden" name="_method" value="PUT">
   
    <input id="prodId" name="pv_cod" type="hidden" value="{{$m->num_pv_cod}}">
    <input id="prodId" name="pv_recep" type="hidden" value="{{$m->num_pv_rec}}">
    <input id="prodId" name="prix_acc" type="hidden" value="{{$m->prix_acci}}">
    <input id="prodId" name="date_acc" type="hidden" value="{{$m->date_acc}}">
    <input id="prodId" name="service" type="hidden" value="{{$m->service}}">
    <input id="prodId" name="localisation" type="hidden" value="{{$m->localisation}}">
    <input id="prodId" name="derection" type="hidden" value="{{$m->derection}}">
    
    <input id="prodId" name="nome_immob" type="hidden" value="{{$m->desingnation}}">
    <input id="prodId" name="inv" type="hidden" value="{{$m->num_inv}}">
    <input id="prodId" name="code_bare" type="hidden" value="{{$m->code_bar}}">
    <input id="prodId" name="num_mat" type="hidden" value="{{$m->num_mat}}">
    <input id="prodId" name="num_serie" type="hidden" value="{{$m->num_serie}}">


            <table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000; ">
                                                                        <thead>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">N° Compte comptable</th>
                                                                        <th colspan="2">code comptable </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                            
                                                                            <td colspan="2"><input type="text" name="compte_comp" value="{{old('compte_comp')}}" class="form-control" placeholder="compte coptable" aria-label="N compte" aria-describedby="basic-addon1">
                                                                            @if ($errors->has('compte_comp'))
                                                                                                            <span class="alert alert-danger">
                                                                                                                <strong>{{ $errors->first('compte_comp') }}</strong>
                                                                                                            </span>
                                                                            @endif
                                                                            </td>
                                                                          
                                                                                <td colspan="2"><input type="text" name="code_comp" value="{{old('code_comp')}}" class="form-control" placeholder="code comptable " aria-label="Branche " aria-describedby="basic-addon1"></td>

                                                                        </tr>
                                                                        
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr style="text-align: center;">
                                                                        <th colspan="2">numero invrntaire</th>
                                                                        <th colspan="2">Type Immobilisation </th>
                                                                        </tr>
                                                                        <tr style="text-align: center;">
                                                                           
                                                                                <td colspan="2"> <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                            </div>
                                                                            <input type="text" name="inv" value="{{old('inv')}}" class="form-control" aria-label="" placeholder="numero inventaire">

                                                                            </div></td>  
                                                                            
                                                                                    <td colspan="2">
                                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-append">
                                                                            <span class="input-group-text">+</span>
                                                                        </div>    
                                                                                <select class="custom-select" name="type_immo" value="{{old('type_immo')}}" id="inputGroupSelect01">
                                                                                <option selected value="{{old('type_immo')}}">Choose...</option>
                                                                                <option value="ammortissable">ammortissable</option>
                                                                                <option value="non ammortisable">non ammortisable</option>
                                                                                
                                                                            </select>
                                                                            </div></td>
                                                                            </tr>
                                                                            <tr style="text-align: center;">
                                                                            <th colspan="2">TVA</th>
                                                                            <th colspan="2">Hore tax </th>
                                                                            </tr>
                                                                            <tr style="text-align: center;">
                                                                            
                                                                                <td colspan="2"> <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                            </div>
                                                                            <input type="text" name="TVA" id="tva" value="{{old('TVA')}}" class="form-control" aria-label="" placeholder="TVA">
                                                                            
                                                                                <td colspan="2"><input type="text"  name="hore_tax" id="ht" value="{{old('hore_tax')}}" class="form-control" placeholder="HORE TAX" aria-label="nom de l'imobilisation" aria-describedby="basic-addon1"></td>
                                                                            </div></td>
                                                                            </tr>
                                                                            <tr style="text-align: center;">
                                                                            <th colspan="2">TTC</th>
                                                                            <th colspan="2">taux ammortisemment </th>
                                                                            </tr>
                                                                            <tr style="text-align: center;">
                                                                             
                                                                            <td colspan="2">    
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text" onclick="cal()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.5.75a.75.75 0 00-1.5 0V2H3.75A1.75 1.75 0 002 3.75V5H.75a.75.75 0 000 1.5H2v3H.75a.75.75 0 000 1.5H2v1.25c0 .966.784 1.75 1.75 1.75H5v1.25a.75.75 0 001.5 0V14h3v1.25a.75.75 0 001.5 0V14h1.25A1.75 1.75 0 0014 12.25V11h1.25a.75.75 0 000-1.5H14v-3h1.25a.75.75 0 000-1.5H14V3.75A1.75 1.75 0 0012.25 2H11V.75a.75.75 0 00-1.5 0V2h-3V.75zm5.75 11.75h-8.5a.25.25 0 01-.25-.25v-8.5a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v8.5a.25.25 0 01-.25.25zM5.75 5a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75v-4.5a.75.75 0 00-.75-.75h-4.5zm.75 4.5v-3h3v3h-3z"></path></svg></span>
                                                                                    </div>
                                                                            <input type="text" name="TTC" id="ttc"  class="form-control" disabled="disabled" placeholder="......" aria-label="Branche " aria-describedby="basic-addon1" >
                                                                            
                                                                            </div></td>


                                                                            <td colspan="2">    
                                                                                <div class="input-group mb-3">
                      
                                                                            <input type="text" name="T_am" value="{{old('T_am')}}" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="taux ammortisemment">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">%</span>
                                                                            </div>
                                                                            </div></td>
                                                                            </tr>
                                                                            <tr style="text-align: center;">
                                                                            <th colspan="2">Situation</th>
                                                                            <td colspan="2">
                                                                                <div class="input-group mb-3">
                                                                                <div class="input-group-append">
                                                                            <span class="input-group-text">+</span>
                                                                        </div>  
                                                                            <select class="custom-select" name="situation" value="{{old('situation')}}" id="inputGroupSelect01">
                                                                            
                                                                            <option value="1">non réformé</option>
                                                                            <option value="2">réformé</option>
                                                                            
                                                                        </select>
                                                                    </td>
                                                                            
                                                                            </tr>
                                                                            

                                                                        </tbody>
                                                                        </table>
                                                                        <div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">OK</button></div>
        </form>   

</div>

<script>
 function cal(){
    var tva = document.getElementById('tva').value;
    var ht = document.getElementById('ht').value;
    var ttc = tva*ht;
    document.getElementById('ttc').placeholder = ttc;
    inp = document.getElementById('ttc');
    inp.value = ttc;
 }
</script>

@endsection
