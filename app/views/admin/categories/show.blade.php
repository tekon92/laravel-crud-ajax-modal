{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/categories/show.blade.php --}}
{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/events/show.blade.php --}}
<div class="modal fade" id="showEvent" tabindex="-1" role="dialog" aria-labelledby="showEventLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="showEventLabel">Your Category</h4>
      </div>
      <div class="modal-body">
        <h2>Check out the following posts:</h2>
    	<div id="views">
    		
    	</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="clear">Close</button>
          {{-- <button type="button" class="btn btn-primary">Confirm</button> --}}
        </div>
      </div>
    </div>
  </div>
</div>