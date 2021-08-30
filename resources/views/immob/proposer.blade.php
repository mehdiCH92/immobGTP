@extends('layouts.master')
@section('content')

@if(!empty($mess))

<div class="container-fluid" style="margin-top: 30px;margin-bottom: 30px;color:#000000">
<div class="alert alert-danger" role="alert">
  {{$mess}}
</div>
</div>
@endif
@if(!empty($mes))

<div class="container-fluid" style="margin-top: 30px;margin-bottom: 30px;color:#000000">
<div class="alert alert-success" role="alert">
  {{$mes}}
</div>
</div>
@endif

<div class="container text-center">
	<h2><span class="badge badge-secondary text-center">Proposer en reforme</span></h2>
  </div>
<div class="container-fluid" style="margin-top: 30px; color:#000000">

											<table class="table table-striped indtab text-center">
											<thead>
												<tr  class="border border-dark text-dark bg-secondary" >
													<th class="border border-dark">code comptable</th>
                                                    <th class="border border-dark">code_bar</th>
													<th class="border border-dark">desingnation</th>
													<th class="border border-dark">date accisition</th>
													<th class="border border-dark">prix aquisition</th>
													<th class="border border-dark">etat</th>
                                                    <th class="border border-dark" style="width:600px;">description d'etat</th>
													
													<th class="text-center border border-dark">Action</th>
												</tr>
											</thead>
                                            <tbody style="background-color: #ccd1d1">
                                            @foreach($lim as $l)
													<tr class="border border-dark">
													<td class="border border-dark" >{{$l->code_comptable}}</td>
													<td class="border border-dark">{{$l->code_bar}}</td>
													<td class="border border-dark">{{$l->desingnation}}</td>
													<td class="border border-dark">{{$l->date_acc}}</td>
													<td class="border border-dark">{{$l->prix_acci}}</td>
													<td class="border border-dark">{{$l->etat}}</td>
                                                    <td class="border border-dark" style="width:600px;">{{$l->descEtat}}</td>
												
														<td style='display: inline-block;'><form action="{{ url('proposer/'.$l->id.'/edit') }}" method="POST">{{csrf_field()}}<button type="submit" class="btn btn-outline-info">proposer</button></form></td>
													</tr>
                                            @endforeach
                                            </tbody>		
											</table>

										</div>



@endsection