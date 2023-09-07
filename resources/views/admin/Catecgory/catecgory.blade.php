@extends('admin.dashboard')

@section('catecgory')
    <main>
        <div class="container" style="width: 100%">

            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2>Catecgories list</h2>
                        </div>
                        <div class="col">
                            <a style="float: right;" class="btn btn-primary" href="{{ url('admin/Catecgory/create') }}">Add
                                Catecgory</a>
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
                        @foreach ($postcrud as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form method="POST" action="{{ url('/admin/Catecgory/' . $item->id) }}"
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
