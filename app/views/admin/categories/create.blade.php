{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/categories/create.blade.php --}}
<div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New Event</h4>
      </div>
      <div class="modal-body">
          	<div class="alert alert-danger avatar_alert" role="alert" style="display: none">
              <ul></ul>
          	</div>
        	{{ Form::open(['route' => 'event.create', 'method' => 'post', 'id' => 'event_form']) }}
  		  	<div class="control-group">
  				{{ Form::label('name', 'Name', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('name', null, ['class' => 'span5', 'placeholder' => 'Name', 'id' => 'name'])}}
  				</div>
  			</div>
  			<div class="control-group">
  				{{ Form::label('description', 'Description', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('description', null, ['class' => 'span5', 'placeholder' => 'Description', 'id' => 'description'])}}
  				</div>
  			</div>
  			<div class="control-group">
  				{{ Form::label('location', 'Location', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('location', null, ['class' => 'span5', 'placeholder' => 'Location', 'id' => 'location'])}}
  				</div>
  			</div>
  			<div class="control-group">
  				{{ Form::label('started_at', 'Started At', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('started_at', null, ['class' => 'span5', 'placeholder' => 'Started At', 'id' => 'started_at'])}}
  				</div>
  			</div>
  			<div class="control-group">
  				{{ Form::label('ended_at', 'Ended At', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('ended_at', null, ['class' => 'span5', 'placeholder' => 'Ended At', 'id' => 'ended_at'])}}
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