@extends('layouts.master')
@section('content')
<div class="container text-center">
  <h2><span class="badge badge-secondary text-center">Ajouter un Service </span></h2>
</div>
<form action="service/store" method="POST">
{{csrf_field()}}
<div class="container" style="margin-top: 80px; margin-bottom: 0px;">
<table class="table table-striped" style="border-style:solid;border-width: 2px; background-color: #fff;color: #000000;margin-bottom: 0px; ">
  <tbody>
    <tr style="text-align: center;">
      <th>n° Service </th>
      <td scope="col">555</td>
      <th> Service </th>
   <td scope="col"><input type="text" name="service" class="form-control" placeholder="Informatique " aria-label="class" aria-describedby="basic-addon1"></td>
   <th> Derection</th>
    <td scope="col">
        <div class="input-group mb-3">
        <div class="input-group-append">
    <span class="input-group-text">+</span>
  </div>  
    <select class="custom-select" name="derection" id="inputGroupSelect01">
    <option selected>Choose...</option>
    @foreach($der as $d)
    <option value="{{$d->derection}}">{{$d->derection}}</option>
    @endforeach

  </select>
</div>
    </td>

    </tr>
  </tbody>
</table>
<div class="btns"> <button type="submit" class="btn btn-primary" style="float: right; margin-top: 0px;width: 150px;">Submit</button></div>
</div>
</form>
<div class="container">
<table class="table table-bordered table-striped " style="margin-top: 80px; margin-bottom: 0px; color:#000;background-color: #fff;">
  <thead>
    <tr class="text-center border border-dark text-dark bg-secondary">
       <th scope="col" >ID</th>
      <th style="width:400px;">Service</th>
      <th style="width:400px;">Derection</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody style="background-color: #ccd1d1">
  @foreach($se as $b)
    <tr class="text-center">
      <th scope="row">{{$b->id}}</th>
      <td style="width:400px;">{{$b->service}}</td>
      <td style="width:400px;">{{$b->derection}}</td>
      <td scope="col"><a onclick="confirmDelete({{$b->id}})"><button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button></a></td>
     <!-- <td scope="col"><form action="{{url('service/'.$b->id)}}" method="POST"> {{csrf_field()}}{{ method_field('DELETE')}}<button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg></button></form></td>-->
  @endforeach
     
    </tr>

  </tbody>
</table>

</div>


<script>
	function confirmDelete(id) {
		let url = "{{ route('service', ':id') }}";
        url = url.replace(':id', id)
		var result = confirm("vouler vous vremment supprimer!");
		if (result == true) {
			document.location.href=url;
		} else {
			/**/
		}
		
	}
</script>
@endsection