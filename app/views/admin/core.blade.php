{{-- /home/vagrant/Code/ajaxcrud4/app/views/admin/core.blade.php --}}

<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.header')
    <body>
    	{{-- topnav --}}
        @include('admin.partials.topnav')
        {{-- end-topnav --}}
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                    	{{-- sidebar --}}
                        @include('admin.partials.sidebar')
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        {{-- content --}}
                        @yield('content')
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        @include('admin.partials.footer')
      	{{-- footer --}}
    </body>
</html>