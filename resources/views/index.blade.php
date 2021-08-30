
@extends('layouts.master')
@section('content')
<div class="container ">

										<div class="container" style="margin-top: 30px;">
											<table class="table table-striped custab indtab">
											<thead>
												<tr>
													<th>ID</th>
													<th>nom</th>
													<th>class</th>
													<th>lieu</th>
													<th>prix</th>
													<th>Dépréciation</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
													<tr>
													<th>01</th>
													<th>bureau</th>
													<th>meubles</th>
													<th>administation</th>
													<th>800</th>
													<th>20</th>
														<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
													</tr>
													<tr>
													<th>01</th>
													<th>bureau</th>
													<th>meubles</th>
													<th>administation</th>
													<th>800</th>
													<th>20</th>
														<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
													</tr>
													<tr>
													<th>01</th>
													<th>bureau</th>
													<th>meubles</th>
													<th>administation</th>
													<th>800</th>
													<th>20</th>
														<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
													</tr>

											</table>
										</div>


<div class="container">
<div class="row">
<div class="col" style="background-color: #fff;border: solid;border-width: 2px;border-color:#000;   margin: 10px;">
<canvas id="myChart" width="300" height="100"></canvas>
</div>
<div class="col" style="background-color: #fff;border: solid;border-width: 2px;border-color:#000;margin: 10px;">
<canvas id="myChart2" width="300" height="100" ></canvas>
</div>
</div>
</div>

<script>
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});

		var ctx2 = document.getElementById('myChart2');
		var myChart2 = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			}

		});


</script>

@endsection
