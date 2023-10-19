@extends('layouts.master')

@section('title', 'home')

@section('content')

    <div class="catecgory">
        <br>
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
        <br>
        <br>
    </div>

        <!-- slide-->
        <div slider>
            <img
          className="d-block w-100"
          src="https://ik.imgkit.net/3vlqs5axxjf/TW-Asia/uploadedImages/Industry/Destinations/statues-at-angkor-wat.jpg?tr=w-1200%2Cfo-auto"
          style="height:300" width="100%"/>
        </div>

        <br>
        <br>
        <h1 class="text-center">សិប្បកម្មបុរាណសូមស្វាគមន៍</h1>
       

        
        <div class="card-container">
            @if ($postcrud->count() > 0)
            @foreach ($postcrud as $item)
            <div class="card">
                <img src="{{ asset('images/' . $item->image) }}" alt="" class="src">
                <div class="card-content">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->content }}</p>
                    <a href="{{ url('home/' . $item->id) }}" class="btn">Read More</a>
                </div>
            </div>
            @endforeach
        @else
        </div>
        
        
        <tr>
            <td class="text-center" colspan="5">Item not found</td>
        </tr>
        @endif
    </body>
    
    <!-- *************************************footer******************************************* -->
    <footer>
        <div class="foo_top">
            <div class="foo_menue">
                <ul>
                    <a href="#"><li>Home</li></a>
                    <a href="#"><li>Services</li></a>
                    <a href="#"><li>Contace Us</li></a>
                    <a href="#"><li>Helps</li></a>
                </ul>
            </div>
            <div class="foo_contact">
                <div class="foo foo_contact_left">
                    <h3>Address</h3>
                    <p>Royal University of phnom penh</p>
                    <p><b>Location: Phnom Penh</b></p>
                </div>
                <div class="foo foo_contact_right">
                    <h3>Phone Number</h3>
                    <p>Tail: 069680104</p>
                    <p>Tail: 069680104</p>
                </div>
                <div class="foo foo_contact_center">
                    <h3>Follow Us</h3>
                    <p class="fab fa-facebook"><a href="#">Facebook</a></p>
                    <p class="fab fa-instagram"><a href="#">Instragram</a></p>
                </div>
            </div>
        </div>
    </footer>
@endsection
