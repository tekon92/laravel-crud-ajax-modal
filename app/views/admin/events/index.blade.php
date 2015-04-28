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

<script>
$('#category_form').submit(function(){
	$.post('{{ URL::route('category.create') }}', $(this).serialize(), function(response){
		// console.log(res);
		var info = $('.avatar_alert');
		 info.hide().find('ul').empty();
        if(!response.success)
        {
        	for(var k in response.msg){
        		if(response.msg.hasOwnProperty(k)){
        			response.msg[k].forEach(function(val){
        			    info.find('ul').append('<li>' + val + '</li>');	
        			});
        			
        		}
        	}

            info.slideDown();
        }
        else if(response.success){
          window.location = "{{ URL::route('category.index')}}";
        }

	});

	return false;
});

// $('#update_event').submit(function(){
//     var id = 
//     var url = 
// })
var edit_id = null;
$('.category_edit').on('click', function(){
    var id = $('td:first', $(this).parents('tr')).text();
    edit_id = id;
    $.get('/edit/'+id, function(response){
        for (var i in response) {
            $('input[name="'+i+'"]').val(response[i]);
        }
    },'json');
});

$('.category_show').click(function(){
    var id = $('td:first', $(this).parents('tr')).text();
    $('#views').empty();
    $.get('/show/'+id, function(response){
            $('#views').append($('<p>', {text: [response.name, response.id] })).find('p').addClass("text-success");
            $('#views').append($('<p>', {text: [response.slug] })).find('p').addClass("text-error");
    }, 'json');
});

$('.delete-event').click(function(evnt) {
            var href = $(this).attr('href');
            var message = $(this).attr('data-content');
            var title = $(this).attr('data-title');
            var html = $('.deletemodal').html();

            if (!$('#dataConfirmModal').length) {
                $('body').append(html);
            } 

            $('#dataConfirmModal').find('.modal-body').text(message);
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show:true});
});

$('#updateButton').click(function(){
        var name = $('#edit_form').find('input[name=name]').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = edit_id;
        var URL = "/update/"+id;

        var formdata = {
            'name' : name,
            '_token' : token
        };

        $.ajax({
            url: URL,
            type: 'PUT',    
            data: formdata,
            dataType: 'json',
            success: function(result) {
                window.location = "{{ URL::route('category.index')}}";
            }
        });
});


</script>
@stop