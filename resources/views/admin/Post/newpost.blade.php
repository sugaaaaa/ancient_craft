<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <div class="card mt-5" onclick="history.back()" style="cursor: pointer;">
        <div class="card-header">
            Back
        </div>
    </div>

    <div class="card mb-4 mt-5">
        {{-- <div class="card-header">
            Add New Post
        </div> --}}

        <div class="card-body mt-2">
            <h3 class="card-title">Add New Post</h3>
            <form class="form-group mt-4" method="post" action="{{url('/admin/Post/newpost')}}" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="formGroupExampleInput2">Title *</label>
                <input  class="form-control mt-2" type="text" name="title" id="title" required placeholder="Title">
            </div>

            <div class="form-group mt-4">
                <label for="formGroupExampleInput2">Content *</label>
                <textarea  class="form-control mt-2" name="content" id="content" required placeholder="Content"></textarea>
            </div>

            <div class="form-group mt-4">
                <label for="image" class="form-label">Image *</label>
                <img src="" alt="" id="file-preview">
                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="showFile(event)" required>
            </div>  
            <br/>
                                <div class class="form-group mt-4">
                                    <label for="category">Category:</label><br>
                                    <select name="category"  id="category" class="form-control">
                                        @foreach($catecgories as $category)
                                           {{-- <option value="{{ $id }}">{{ $name }}</option> --}}
                                            <option value="{{ $category ->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tag</label>
                                    <div class="tag-wrapper">
                                        @foreach ($tags as $tag)
                                        <div class="form-check form-check-inline">
                                          <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="tags[]"
                                            value="{{ $tag->id }}"
                                            id="tag{{ $tag->id }}"
                                          />
                                          <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                        </div>
                                      @endforeach
                                    </div>                   
                                  </div>
                                <button  type="submit" name="submit" class="btn btn-primary mt-4">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
</body>
</html>