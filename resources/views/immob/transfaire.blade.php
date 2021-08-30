@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center">Transférer une immobilisation </span></h2>
  </div>

<div class="container-fluid" style="margin-top: 30px;margin-bottom: 30px;color:#000">

											<table class="table table-striped indtab text-center">
											<thead>
												<tr  class="border border-dark text-dark bg-secondary" >
													<th class="border border-dark">desingnation</th>
                                                    <th class="border border-dark">Localisation</th>
													<th class="border border-dark">Derection</th>
													<th class="border border-dark">service</th>
													<th class="border border-dark">l'etat</th>
													<th class="border border-dark" style="width:300px;"> description d'etat</th>
                                                    
													
													<th class="text-center border border-dark">Action</th>
												</tr>
											</thead>
                                            <tbody style="background-color: #ccd1d1">
                                            @foreach($lim as $l)
													<tr class="border border-dark">
													<td class="border border-dark" >{{$l->desingnation}}</td>
													<td class="border border-dark">{{$l->localisation}}</td>
													<td class="border border-dark">{{$l->derection}}</td>
													<td class="border border-dark">{{$l->service}}</td>
													<td class="border border-dark">{{$l->etat}}</td>
													<td class="border border-dark" style="width:300px;">{{$l->descEtat}}</td>
                                                
												
														<td style='display: inline-block;'><form action="{{ url('badale/'.$l->id) }}" method="POST">{{csrf_field()}}<button type="submit" class="btn btn-dark">transfairer</button></form></td>
													</tr>
                                            @endforeach
                                            </tbody>		
											</table>

										</div>
										@endsection
