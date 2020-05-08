@extends('front-end.layouts.app')
@section('title')
    Search Result
@endsection
@section('body-content')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- block content -->
                <div class="block-content">
                    <!-- grid box -->
                    <div class="grid-box">
                        <div class="title-section">
                            <h1><span class="world">Your Search Result</span></h1>
                        </div>
                        @if($items->isNotEmpty())
                            @foreach ($items as $item)
                                <div class="news-post large-post">
                                    <div class="post-gallery">
                                        @if($item->photo != null)
                                            <img src="{{ \App\Http\Controllers\ExtraController::photoURL($item->photo) }}" alt="{{$item->name}}">
                                        @else
                                            <img src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                        @endif
                                        @if($item->refCategory != null)
                                            <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($item->refCategory->name),'id'=>Crypt::encrypt($item->refCategory->id)]) }}">{{$item->refCategory->name}}</a>
                                        @endif
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{route('news-details',['name'=>Str::slug($item->name),'id'=>Crypt::encrypt($item->id)])}}">{{$item->name}}</a></h2>
                                        <ul class="post-tags">
                                            <?php
                                            if($item->date != null){
                                                $newDateString = date_format(date_create_from_format('Y-m-d', $item->date), 'd-m-Y');
                                            }
                                            ?>
                                            @if($item->date != null)
                                                <li><i class="fa fa-clock-o"></i>{{$newDateString}}</li>
                                            @endif
                                            @if($item->autor != null)
                                                <li><i class="fa fa-user"></i>by {{$item->autor}}</li>
                                            @endif
                                            <li><a href="{{route('news-details',['name'=>Str::slug($item->name),'id'=>Crypt::encrypt($item->id)])}}"><i class="fa fa-comments-o"></i><span>{{$item->refComment->count()}}</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="post-content">
                                        <p>{!! $item->description !!}</p>
                                        <a href="{{route('news-details',['name'=>Str::slug($item->name),'id'=>Crypt::encrypt($item->id)])}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                No News Found
                            </div>
                        @endif
                    </div>
                    <div class="pagination-box">
                        {{ $items->links() }}
                    </div>
                    <!-- End Pagination box -->
                </div>
                <!-- End block content -->
            </div>
            {{-- SIDE BAR --}}
            @include('front-end.layouts.ridgt-side-bar')
            {{-- SIDE BAR --}}
        </div>
    </div>
</section>
@stop
