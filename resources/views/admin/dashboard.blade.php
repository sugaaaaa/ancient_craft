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
    </div>
    
@endsection
