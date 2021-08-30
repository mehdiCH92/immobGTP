@extends('layouts.master')
@section('content')
<div class="container text-center">
	<h2><span class="badge badge-secondary text-center" > La sortie d'une Immobilisation </span></h2>
  </div>
<div class="container-fluid" style="margin-top: 0px;color:#000000">

<table class="table table-striped indtab text-center">
											<thead>
												<tr  class="border border-dark text-dark bg-secondary" >
													<th class="border border-dark">code comptable</th>
													<th class="border border-dark">desingnation</th>
													<th class="border border-dark">date accisition</th>
													<th class="border border-dark">prix aquisition</th>
													<th class="border border-dark">etat</th>
													<th class="border border-dark" style="width:300px;">la description d'etat</th>
                                                    <th class="border border-dark" style="width:300px;">la cause de reformme</th>
													
													<th class="text-center border border-dark">Action</th>
												</tr>
											</thead>
                                            <tbody style="background-color: #ccd1d1">
                                            @foreach($lim as $l)
													<tr class="border border-dark">
													<td class="border border-dark" >{{$l->code_comptable}}</td>
													<td class="border border-dark">{{$l->desingnation}}</td>
													<td class="border border-dark">{{$l->date_acc}}</td>
													<td class="border border-dark">{{$l->prix_acci}}</td>
													<td class="border border-dark">{{$l->etat}}</td>
													<th class="border border-dark" style="width:300px;">{{$l->descEtat}}</th>
                                                    <th class="border border-dark" style="width:300px;">{{$l->description}}</th>
												
													<td ><form action="{{ url('prdelete/'.$l->id_i) }}" method="POST" style='display: inline-block;width:100px;'> {{csrf_field()}}{{ method_field('DELETE')}}<button type="submit" class="btn btn-danger"></form><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button> <a href="{{url('sortie_ref/'.$l->id_i)}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM0 8a8 8 0 1116 0A8 8 0 010 8zm11.78-1.72a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg></a></td>
													</tr>
                                            @endforeach
                                            </tbody>		
											</table>

										</div>

										</div>
										


@endsection