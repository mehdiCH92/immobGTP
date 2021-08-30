@extends('layouts.master')
@section('content')
<form action="{{url('reg')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden"  name="id" value={{$id}}>
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
        <!--<td colspan="2"> <label for="floatingInputValue">commence a</label><input class="form-control" name="commance" type="date" value="yyyy-mm-dd"></td>-->
        <td colspan="2"><label for="floatingInputValue">terminer a</label><input class="form-control" name="termine"  type="date" value="yyyy-mm-dd"></td>
        </tr>
      </tbody>
    </table>
    <div class="btns"> <button type="submit" class="btn btn-outline-success" style="float: right; margin-top: 0px;width:100px; ">calculer</button></div>
   </div>
  </div>
  
</form>
@endsection
