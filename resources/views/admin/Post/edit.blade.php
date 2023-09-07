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
    <div class="container mt-5">

        <div class="card mt-5" onclick="history.back()" style="cursor: pointer;">
            <div class="card-header">
                Back
            </div>
        </div>

        <div class="card mb-4 mt-5">
            <div class="card-header">
                <h2>Updarte Product</h2>
            </div>

            <div class="card-body mt-2">
                <div class="row">
                    <div class="col">

                        <form class="form-group mt-" method="post"
                            action="{{ url('/admin/Post/edit/' . $postcrud->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="formGroupExampleInput2">Title *</label>
                                <input class="form-control mt-2" value="{{ $postcrud->title }}" type="text"
                                    name="title" id="title" required placeholder="Title">
                            </div>

                            <div class="form-group mt-4">
                                <label for="formGroupExampleInput2">Content *</label>
                                <textarea class="form-control mt-2" name="content" id="content" required placeholder="Content">{{ $postcrud->content }}</textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label for="image" class="form-label">Image *</label>
                                <img src="" id="file-preview">
                                <input class="form-control" type="file" name="image" id="image"
                                    accept="image/*" onchange="showFile(event)" required>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select
                                  class="form-select"
                                  name="category_id"
                                  aria-label="Default select example"
                                >
                                  <option selected>Select Category</option>
                                  @foreach($postcrud as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $postcrud->category ? 'selected' : '' }}>{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>                               --}}
                            </div>
                            <br />
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
                                        {{ in_array($tag->id, $postcrud->tags()->pluck('id')->toArray()) ? 'checked' : '' }}
                                      />
                                      <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                  @endforeach
                                  
                                </div>
                              </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-4">Update</button>
                        </form>



                    </div>
                    <div class="col ">
                        <img style="float: center;  border-radius: 10px  ; border: 1px solid black"
                            src="{{ asset('images/' . $postcrud->image) }}" width="auto", height="400px"
                            max-height="400px" alt="" id="file-preview" value="{{ $postcrud->image }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
