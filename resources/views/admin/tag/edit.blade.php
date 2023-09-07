<!DOCTYPE html>
<html lang="en">
    <head>
           <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <main class="mb-4 mt-5">
            <div class="container">

                <div class="card mt-5" onclick="history.back()" style="cursor: pointer;">
                    <div class="card-header">
                        Back
                    </div>
                </div>
            
                <form class="form-group" method="POST" action="{{ url('/admin/tag/edit/' . $tagpost->id) }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="card mb-4 mt-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2>Create Tags</h2>
                                </div>
                                <div class="col">
                                    <button style="float: right;" class="btn btn-primary text-uppercase" type="submit" name="submit">Create</button>
                                    {{-- <a style="float: right;" class="btn btn-primary" href="{{url('admin/Post/newpost')}}">New Post</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-3">
                            <div class="form-group">
                                <div class="col-4">
                                    <input  class="form-control mt-2 " type="text" name="name" id="name" required placeholder="Create tag " value = "{{ $tagpost->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>

