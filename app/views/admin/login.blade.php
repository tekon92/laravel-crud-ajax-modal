{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/login.blade.php --}}
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
            	@if ($errors->has())
		        <div class="alert alert-danger">
		            {{ $errors->first() }}
		        </div>
		        @endif
            	{{ Form::open(['route' => 'login', 'class' => 'form-vertical', 'method' => 'post']) }}
					<div class="module-head">
                        <h3>Sign In</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                            	{{ Form::text('username', null, ['class' => 'span12', 'id' => 'inputEmail', 'placeholder' => 'Username'])}}
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                            	{{ Form::password('password', ['class' => 'span12', 'id' => 'inputPassword', 'placeholder' => 'Password'])}}
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                {{ Form::submit('Login', ['class' => 'btn btn-primary pull-right'])}}
                                <label class="checkbox">
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
            	{{ Form::close() }}
            </div>
        </div>
    </div>
</div><!--/.wrapper-->