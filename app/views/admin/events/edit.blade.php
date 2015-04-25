{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/events/edit.blade.php --}}
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editCategoryLabel">New Category</h4>
      </div>
      <div class="modal-body">
        {{ Form::model($cat, ['method' => 'post' ,'route' => ['category.update', $cat->id]]) }}
  			<div class="control-group">
  				{{ Form::label('name', 'Name', ['class' => 'control-label'])}}
  				<div class="controls">
  					{{ Form::text('name', null, ['class' => 'span5', 'placeholder' => 'Name'])}}
  				</div>
  			</div>
        	{{ Form::close()}}
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</div>