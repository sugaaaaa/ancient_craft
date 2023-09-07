
@extends('admin.dashboard')
@section('post')

<title>Posts</title>
<!-- Main Content-->
<main>
    <div class="container" style="width: 100%">
        <div class="card mb-4 mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Post list</h2>
                    </div>


                    <div class="col-md-6">
                        <form class="d-flex" role="search" action="{{url('/admin/dashboard/Post/post')}}" method="GET" name="search">
                            <input  class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        </div>
                    <div class="col">
                        <a style="float: right;" class="btn btn-primary" href="{{url('admin/Post/newpost')}}">New Post</a>
                    </div>
                </div>
            </div>

          
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tag</th>
                    </tr>
                </thead>
                        <tbody>
                            @foreach($postcrud as $item)
                                <tr>
                                    
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td><img src="{{asset('images/' . $item->image)}}" height=50 width="auto"></td>
                                    <td>{{ $item->category}}</td>
                                    <td>
                                        <ul>
                                          @foreach ($item->tags as $tag)
                                            <li>{{ $tag->id }} - {{ $tag->name }}</li>
                                          @endforeach
                                        </ul>
                                      </td>
                                    <td> <a href="{{ url('/admin/Post/show/'. $item->id)}}" title="View Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ViewItem</button></a>
                                        <a href="{{ url('/admin/Post/edit/'. $item->id)}}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update</button></a>
                                        <form method="POST" action="{{ url('/admin/Post/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
  
