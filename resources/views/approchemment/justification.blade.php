@extends('layouts.master')
@section('content')

    <div class="container-fluid text-center" style="margin-top: 30px;color:#000;" id="conttab">

        <h3> <span class="badge badge-secondary">Liste des immobilisation en plus physique </span></h3>

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
          <th class="border border-dark"> justification</th>
          
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
          <td ><form action="{{url('phys/'.$l->id)}}" method="POST" style='display: inline-block;width:100px;'>{{csrf_field()}}{{ method_field('DELETE')}}<button type="submit" class="btn btn-danger"></form><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button> <a href="{{url('ajout/'.$l->id)}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM0 8a8 8 0 1116 0A8 8 0 010 8zm11.78-1.72a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg></a></td>
          
          </tr>
          @endforeach
        </tbody>		
      </table>

    </div>

    <div class="container-fluid text-center" style="margin-top: 30px;color:#000;" id="conttab">

        <h3> <span class="badge badge-secondary">Liste des immobilisation en plus Systemme </span></h3>

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
            <th class="border border-dark"> justification</th>
            
          </tr>
        </thead>
           <tbody style="background-color: #ccd1d1">
            @foreach($ims as $l)
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
            <td><a href="{{url('sortie_re/'.$l->id)}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.122.392a1.75 1.75 0 011.756 0l5.25 3.045c.54.313.872.89.872 1.514V7.25a.75.75 0 01-1.5 0V5.677L7.75 8.432v6.384a1 1 0 01-1.502.865L.872 12.563A1.75 1.75 0 010 11.049V4.951c0-.624.332-1.2.872-1.514L6.122.392zM7.125 1.69l4.63 2.685L7 7.133 2.245 4.375l4.63-2.685a.25.25 0 01.25 0zM1.5 11.049V5.677l4.75 2.755v5.516l-4.625-2.683a.25.25 0 01-.125-.216zm10.828 3.684a.75.75 0 101.087 1.034l2.378-2.5a.75.75 0 000-1.034l-2.378-2.5a.75.75 0 00-1.087 1.034L13.501 12H10.25a.75.75 0 000 1.5h3.251l-1.173 1.233z"></path></svg></a></td>
            
            </tr>
            @endforeach
          </tbody>		
        </table>
  
      </div>
  
@endsection