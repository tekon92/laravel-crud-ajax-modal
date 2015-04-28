{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/partials/topnav.blade.php --}}

@if(Auth::user())
    @include('admin.partials.partials-ext.active-nav')
@else
    @include('admin.partials.partials-ext.login-nav')
@endif