@extends('admin.dashboard')

@section('taggg')
    <main>
        <div class="container" style="width: 100%">

            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2> Tags list</h2>
                        </div>
                        <div class="col">
                            <a style="float: right;" class="btn btn-primary" href="{{ url('/admin/tag/create') }}">Add Tags</a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tagpost as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ url('/admin/tag/edit/'. $item->id)}}" title="name"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                    <form method="POST" action="{{ url('/admin/tag/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
@endsection
