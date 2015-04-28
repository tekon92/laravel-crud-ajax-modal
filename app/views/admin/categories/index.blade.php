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
<a class="btn-box small span2" href="#" data-toggle="modal" data-target="#createEvent" >
	<i class="icon-ambulance"></i>
	<b>Add New</b>
</a>

{{-- modal --}}
@include('admin.categories.create')
@include('admin.categories.edit')
@include('admin.categories.delete')
@include('admin.categories.show')
{{-- end-modal --}}
@stop