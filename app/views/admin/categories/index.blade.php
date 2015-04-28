{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/categories/index.blade.php --}}

@extends('admin.core')

@section('content')
<div class="content">
	<div class="module">
		<div class="module-head">
			<h3>Tables</h3>
		</div>
		<div class="module-body">
			<table class="table">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Name</th>
				  <th>Slug</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				 <td></td>
				 <td></td>
				 <td></td>
				 <td></td>
				</tr>
			  </tbody>
			</table>
			<br />
			<!-- <hr /> -->
			<br />
		</div>
	</div>
<br />
</div><!--/.content-->
<a class="btn-box small span2" href="#" data-toggle="modal" data-target="#createCategory" >
	<i class="icon-ambulance"></i>
	<b>Add New</b>
</a>

{{-- modal --}}
@include('admin.events.create')
@include('admin.events.edit')
@include('admin.events.delete')
@include('admin.events.show')
{{-- end-modal --}}
@stop