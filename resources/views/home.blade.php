@extends('layouts.master')

@section('title', 'home')

@section('content')

    <body>
        <br>
         {{-- call data catecgory --}}
                <td scope="row">
                    <ul  class="list-style-position"; style=“display:flex”;> 
                       
                        @if($catecgories->count() > 0)
                        @foreach($catecgories as $item)
                        <li>
                            <a> {{ $item->name }} </a>
                        </li>
                         @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
        
                            </tr>
        
                        @endif
                        </ul>
                </td>
         {{-- ending call --}}

        <br>
        <br>
        <!-- slide-->
        <div>
            <img
          className="d-block w-100"
          src="https://ik.imgkit.net/3vlqs5axxjf/TW-Asia/uploadedImages/Industry/Destinations/statues-at-angkor-wat.jpg?tr=w-1200%2Cfo-auto"
          style="height:300" width="100%"/>
        </div>
        <br>
        <br>
        <h1 class="text-center">សិប្បកម្មបុរាណសូមស្វាគមន៍</h1>

        {{-- calling data post --}}
        <div class="container ">
            <div class="row">

            @if ($postcrud->count() > 0)
                @foreach ($postcrud as $item)
                        <div class="col-4 mt-2 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions" >
                                        <img src="{{ asset('images/' . $item->image) }}"class="card-img img-fluid"
                                            width="96" height="350" alt="">
                                    </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2">
                                            <h1>{{ $item->title }}</h1>
                                        </h6>
                                        <p>{{ $item->content }}</p>
                                        <a href="{{ url('home/' . $item->id) }}" title="View Item"><button
                                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>ViewItem</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                @endforeach
            @else
        </div>
        </div>
        {{-- end call data post --}}
        <tr>
            <td class="text-center" colspan="5">Item not found</td>
        </tr>
        @endif
    </body>

@endsection
