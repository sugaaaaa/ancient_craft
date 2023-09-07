<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('admin/dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">CMS ADD Pages</h3>    
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error )
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif  
                                         <form name="cmsForm" id="cmsForm" @if (@empty($cmspage['id'])) action="{{
                                          url('admin/pages/add_edit_cmspage') }}" @else action="{{ url('admin/add_edit_cmspage/'.$cmspage['id'])}}" @endif method="POST">@csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Page Title" @if(!empty($cmspage['title'])) value="{{ $cmspage['title'] }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" id="url" name="url"
                                            placeholder="Enter Page URL"  @if(!empty($cmspage['url'])) value="{{ $cmspage['url'] }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Description" 
                                        @if(!empty($cmspage['description'])) value="{{ $cmspage['description'] }}" @endif></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="meta_title" class="form-control" id="meta_title" name="meta_title"
                                            placeholder="Enter Meta Title"  @if(!empty($cmspage['meta_title'])) value="{{ $cmspage['meta_title'] }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="meta_description" class="form-control" id="meta_description" name="meta_description"
                                            placeholder="Enter Meta Description"  @if(!empty($cmspage['meta_description'])) value="{{ $cmspage['meta_description'] }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="meta_keywords" class="form-control" id="meta_keywords" name="meta_keywords"
                                            placeholder="EnterMeta Keywords"  @if(!empty($cmspage['meta_keywords'])) value="{{ $cmspage['meta_keywords'] }}" @endif>
                                    </div>
                                      <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
            
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
