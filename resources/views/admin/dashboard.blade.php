@extends('layouts.master')

@section('content')

    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>
        <div class="lead">
            <p>Welcome to the dashboard, </p>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            {{-- {{ Auth::user()->name }}! --}}

            <ul class="nav nav-pills nav-stacked" id="sidebar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard/Post/post') }}">
                        <i class="fa fa-dashboard"></i>Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard/Catecgory/catecgory') }}">
                        <i class="fa fa-users"></i> Catecgory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard/tag/index') }}">
                        <i class="fa fa-user"></i>Tags</a>
                </li>
                @if (Session::get('page')=="cms_pages")
                @php $active="active" @endphp
                    @else
                    @php $active ="" @endphp
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard/pages/cms_pages') }}">
                        <i class="fa fa-user"></i>CmsPage</a>
                </li>
            </ul>
        </div>
    </div>
        <div class="col-md-8">
            @yield('post')
        </div>
        <div class="col-md-8">
            @yield('catecgory')
        </div>
        <div class="col-md-8">
            @yield('taggg')
        </div>
        <div class="col-md-8">
            @yield('cmsPages')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src=" {{ url('admin/dashboard/pages/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src=" {{ url( 'admin/dashboard/pages/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src=" {{ url('admin/dashboard/pages/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script>
          $(function () {
            $("#cmspages").DataTable();
          });
        </script>
        {{-- custom js--}}
        <script src=" {{ url('admin/pages/js/custom.js') }}"></script>
        <script src="{{ url('admin/pages/plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $('.select2').select2();
        </script>
    </div>
    
@endsection
