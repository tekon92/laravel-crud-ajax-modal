{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/events/index.blade.php --}}

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
				@foreach($categories as $cat)
				<tr>
				  <td>{{$cat->id}}</td>
				  <td>{{$cat->name}}</td>
				  <td>{{$cat->slug}}</td>
				  <td>
				  	<a class="btn btn-small btn-info category_edit" href="#" data-toggle="modal" data-target="#editCategory" id="category_edit">
						Edit
					</a>
					<a class="btn btn-small btn-success category_show" href="#" data-toggle="modal" data-target="#showCategory" id="category_show">
						Show
					</a>
					{{-- <a class="btn btn-danger category_delete" href="#" data-toggle="modal" data-target="#deleteCategory" id="category_delete">
						<b>Delete</b>
					</a> --}}
					{{ HTML::link(URL::route('category.deletex',$cat->id), 'Delete', array('class' => 'btn btn-small btn-danger delete-event', 'data-title'=>'Delete Event', 'data-content' => 'Are you sure you want to delete this event?', 'onClick'=>'return false;')) }}
					{{-- <a href="#" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete">Delete record #23</a> --}}
				  </td>
				</tr>
				@endforeach
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