@extends('layouts.master')
@section('title', 'home')
@section('content')
<head>
    <title></title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- Main Content-->
    <main>
        <div class="container mt-5">

            <div class="card mt-5" onclick="history.back()" style="cursor: pointer;">
                <div class="card-header">
                    Back
                </div>
            </div>

            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <h2>Product</h2>
                </div>

                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h4><strong>Title: </strong> {{ $postcrud->title }}</h4>
                            </div>
                            <div class="form-group">
                                <h4> <strong>Content: </strong> {{ $postcrud->content }}</h4>
                            </div>
                        </div>
                        <div class="col ">
                            <img style="float: center;  border-radius: 10px  ; border: 1px solid black"
                                src="/images/{{ $postcrud->image }}" width="auto", height="400px"
                                max-height="400px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

@endsection
