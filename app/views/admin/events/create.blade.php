{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/events/create.blade.php --}}
<div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New Category</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger avatar_alert" role="alert" style="display: none">
              <ul></ul>
          </div>
        	{{ Form::open(['route' => 'category.create', 'method' => 'post', 'id' => 'category_form']) }}
  		  <div class="control-group">
  				{{ Form::label('name', 'Name', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('name', null, ['class' => 'span5', 'placeholder' => 'Name', 'id' => 'name'])}}
  				</div>
  			</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary" on>Confirm</button> --}}
          {{ Form::submit('Confirm', ['class' => 'btn btn-primary', 'id' => 'btn-add'])}}
        </div>
        	{{ Form::close()}}
      </div>
    </div>
  </div>
</div>