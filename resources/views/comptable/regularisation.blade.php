@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center" > Regularisation </span></h2>
  </div>

<div class="container-fluid" style="margin-top: 30px;margin-bottom: 30px;color:#000000">

<form action="{{ url('recherche') }}" method="POST" style="margin-top=0px" enctype='multipart/form-data' >
{{csrf_field()}}
<table class="float-right">
<tr>
<td style="margin-right:20px;">
<label for="avatar">Recherche par conte comptable :</label>
</td>
<td style="margin-right:20px;">
<input type="text" id="avatar" name="id"  >
</td>
<td style="margin-right:20px;">
<div class="btns"> <button type="submit" class="btn btn-outline-success" style="float: right; margin-top: 0px;width:100px; ">Rechercher</button></div>
</td>
</tr>
</table>

</form>


</div>

<div class="container-fluid" style="margin-top: 0px;color:#000000">

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
													
													<th class="text-center border border-dark">Action</th>
												</tr>
											</thead>
                                            <tbody style="background-color: #ccd1d1">
                                            @foreach($lim as $l)
											    @if($l->TVA <> 0)
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
												
													<td style='display: inline-block;'><a href="{{url('regul/'.$l->id)}}" class="btn btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M5.433 2.304A4.494 4.494 0 003.5 6c0 1.598.832 3.002 2.09 3.802.518.328.929.923.902 1.64v.008l-.164 3.337a.75.75 0 11-1.498-.073l.163-3.33c.002-.085-.05-.216-.207-.316A5.996 5.996 0 012 6a5.994 5.994 0 012.567-4.92 1.482 1.482 0 011.673-.04c.462.296.76.827.76 1.423v2.82c0 .082.041.16.11.206l.75.51a.25.25 0 00.28 0l.75-.51A.25.25 0 009 5.282V2.463c0-.596.298-1.127.76-1.423a1.482 1.482 0 011.673.04A5.994 5.994 0 0114 6a5.996 5.996 0 01-2.786 5.068c-.157.1-.209.23-.207.315l.163 3.33a.75.75 0 11-1.498.074l-.164-3.345c-.027-.717.384-1.312.902-1.64A4.496 4.496 0 0012.5 6a4.494 4.494 0 00-1.933-3.696c-.024.017-.067.067-.067.16v2.818a1.75 1.75 0 01-.767 1.448l-.75.51a1.75 1.75 0 01-1.966 0l-.75-.51A1.75 1.75 0 015.5 5.282V2.463c0-.092-.043-.142-.067-.159zm.01-.005z"></path></svg></a></td>
													
													</tr>
												@endif
                                            @endforeach
                                            </tbody>		
											</table>

										</div>



@endsection