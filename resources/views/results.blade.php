@extends('layouts.frontend')

@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Search Results: {{ $query }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row medium-padding120">
                <div class="container">
                        <div class="row medium-padding120">
                            <main class="main">
                                
                                <div class="row">
                                    @if($posts->count() > 0 )
                                        @foreach($posts as $post)
                                        <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                    <img src="{{$post->featured}}" alt="{{ $post->title }}">
                                                </div>
                                                <a href="{{ route('post.single', ['slug' => $post->slug]) }}"><h6 class="case-item__title">{{ $post->title }}</h6>
                                            </div>
                                        </div>
                                        @endforeach 
                                    @else
                                        <h1 class="text-center">No results found</h1>  
                                    @endif
                                </div>
                    
                                <!-- End Post Details -->
                                <br>
                                <br>
                                <br>
                            </main>
                        </div>
                    </div>
        </div>
    </div>
@endsection