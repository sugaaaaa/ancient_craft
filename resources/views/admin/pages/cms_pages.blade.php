@extends('admin.dashboard')
@section('post')
    <title>Posts</title>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times; </span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                               
                                <h3 class="card-title">CMS Pages</h3>
                                <a style="max-width:150px float:right; display:inline-block"
                                    href="{{ url('admin/pages/add_edit_cmspage') }}" class="btn btn-blockk btn-primary">Add
                                    CMS Page</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="cmspages" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Create on</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($CmsPages as $page)
                                            <tr>
                                                <td>{{ $page['id'] }}</td>
                                                <td>{{ $page['title'] }}</td>
                                                <td>{{ $page['url'] }}</td>
                                                <td>{{ date("F j,Y, g:i a", strtotime($page['created_at'])) }}</td>
                                                <td>
                                                    
                                                    @if ($page['status'] == 1)
                                                        <a class="updateCmsPageStatus" id="page-{{ $page['id'] }}"
                                                            page_id="{{ $page['id'] }}" style="color:#3f6ed3" href="javascript:void(0)">
                                                            <i class="fa-solid fa-toggle-on" status="Active"></i></a>
                                                    @else
                                                        <a class="updateCmsPageStatus" id="page-{{ $page['id'] }}"
                                                            page_id="{{ $page['id'] }}" style="color:grey"
                                                            href="javascript:void(0)"><i class="fa-solid fa-toggle-off"
                                                                status="Inactive"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    <a href={{ url('admin/pages/add_edit_cms_page'.$page['id'])}}  href="javascript:void(0)" style="color:#3f6ed3"; margin-top:-5px;><i class="fas fa-edit"></i></a>
                                                    &nbsp;&nbsp;
                                                    <a  href={{ url('admin/pages/delete_cms_page'.$page['id'])}}  href="javascript:void(0)" style="color:#3f6ed3"; margin-top:-5px;><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>>
    @endsection
