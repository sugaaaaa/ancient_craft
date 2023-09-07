@extends('layouts.master')

@section('title', 'Search Results')

@section('content')
    <style>
        /* Custom CSS to force items to display in a single row */
        
    </style>
    
    <div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-semibold text-center mb-8">Search Results</h1>
            
            <div class="single-row-container">
           {{-- @if($result)
                <p> {{ $results }} </p>
           @else 
                <p> no data </p>
           @endif --}}
               @if ($results->count() >0)
                    @foreach ($results as $result)
                        <div class="result-item mx-4">
                            <div class="flex justify-center">
                                <img class="result-image" src="{{ asset('images/' . $result->image) }}" alt="Image">
                            </div>
                            <div class="result-content">
                                <h2 class="result-title">{{ $result->title }}</h2>
                                <p class="result-description">{{ $result->search }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600 text-xl text-center mt-8">No results found.</p>
                @endif
                
            </div> 

            <div class="show-all-button">
                <a href="{{ url('/search') }}" class="show-all-link">Show All</a>
            </div>
        </div>
    </div>
@endsection
