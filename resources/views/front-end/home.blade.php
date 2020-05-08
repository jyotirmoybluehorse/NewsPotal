@extends('front-end.layouts.app')
@section('title')
    Home
@endsection
@section('body-content')
<section class="heading-news">
    <div class="iso-call heading-news-box">
        <?php
            $top_ngo=App\Models\News::where('ref_category',3)->where('top',1)->with(['refCategory','refComment'])->latest()->first()
        ?>
        @if($top_ngo != null)
            <div class="news-post image-post default-size">
                @if($top_ngo->photo != null)
                    <img height= "200px" width= "236px" src="{{ \App\Http\Controllers\ExtraController::photoURL($top_ngo->photo) }}" alt="{{$top_ngo->name}}">
                @else
                    <img height= "200px" width= "236px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                @endif
                <div class="hover-box">
                    <div class="inner-hover">
                        @if($top_ngo->refCategory != null)
                            <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($top_ngo->refCategory->name),'id'=>Crypt::encrypt($top_ngo->refCategory->id)]) }}">{{$top_ngo->refCategory->name}}</a>
                        @endif
                        <h2><a href="{{route('news-details',['name'=>Str::slug($top_ngo->name),'id'=>Crypt::encrypt($top_ngo->id)])}}">{{$top_ngo->name}}</a></h2>
                        <ul class="post-tags">
                            <?php
                                if($top_ngo->date != null){
                                    $topNgoDateString = date_format(date_create_from_format('Y-m-d', $top_ngo->date), 'd-m-Y');
                                }
                            ?>
                            @if($top_ngo->date != null)
                                <li><i class="fa fa-clock-o"></i>{{$topNgoDateString}}</li>
                            @endif
                            @if($top_ngo->autor != null)
                                <li><i class="fa fa-user"></i>by {{$top_ngo->autor}}</li>
                            @endif
                            <li>
                                <a href="{{route('news-details',['name'=>Str::slug($top_ngo->name),'id'=>Crypt::encrypt($top_ngo->id)])}}">
                                    <i class="fa fa-comments-o"></i>
                                    <span>{{$top_ngo->refComment->count()}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="image-slider snd-size">
            <span class="top-stories">TOP NEWS</span>
            <ul class="bxslider">
                <?php
                    $top_news=App\Models\News::where('feature',1)->orderBy('created_at', 'desc')->with(['refCategory','refComment'])->get()
                ?>
                @foreach ($top_news as $top_new)
                    <li>
                        <div class="news-post image-post">
                            @if($top_new->photo != null)
                                <img height= "400px" width= "200px" src="{{ \App\Http\Controllers\ExtraController::photoURL($top_new->photo) }}" alt="{{$top_new->name}}">
                            @else
                                <img height= "400px" width= "200px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                            @endif
                            <div class="hover-box">
                                <div class="inner-hover">
                                    @if($top_new->refCategory != null)
                                        <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($top_new->refCategory->name),'id'=>Crypt::encrypt($top_new->refCategory->id)]) }}">{{$top_new->refCategory->name}}</a>
                                    @endif
                                    <h2><a href="{{route('news-details',['name'=>Str::slug($top_new->name),'id'=>Crypt::encrypt($top_new->id)])}}">{{$top_new->name}}</a></h2>
                                    <ul class="post-tags">
                                        <?php
                                            if($top_new->date != null){
                                                $topNewsDateString = date_format(date_create_from_format('Y-m-d', $top_new->date), 'd-m-Y');
                                            }
                                        ?>
                                        @if($top_new->date != null)
                                            <li><i class="fa fa-clock-o"></i>{{$topNewsDateString}}</li>
                                        @endif
                                        @if($top_new->autor != null)
                                            <li><i class="fa fa-user"></i>by {{$top_new->autor}}</li>
                                        @endif
                                        <li><a href="{{route('news-details',['name'=>Str::slug($top_new->name),'id'=>Crypt::encrypt($top_new->id)])}}"><i class="fa fa-comments-o"></i><span>{{$top_new->refComment->count()}}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <?php
        $top_news_latests=App\Models\News::where('top',1)->with(['refCategory','refComment'])->latest()->take(5)->get()
        ?>
        @foreach ($top_news_latests as $top_news_latest)
            <div class="news-post image-post">
                @if($top_news_latest->photo != null)
                    <img height= "200px" width= "236px" src="{{ \App\Http\Controllers\ExtraController::photoURL($top_news_latest->photo) }}" alt="{{$top_news_latest->name}}">
                @else
                    <img height= "200px" width= "236px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                @endif
                <div class="hover-box">
                    <div class="inner-hover">
                        @if($top_news_latest->refCategory != null)
                            <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($top_news_latest->refCategory->name),'id'=>Crypt::encrypt($top_news_latest->refCategory->id)]) }}">{{$top_news_latest->refCategory->name}}</a>
                        @endif
                        <h2><a href="{{route('news-details',['name'=>Str::slug($top_news_latest->name),'id'=>Crypt::encrypt($top_news_latest->id)])}}">{{$top_news_latest->name}}</a></h2>
                        <ul class="post-tags">
                            <?php
                                if($top_news_latest->date != null){
                                    $top_news_latestDateString = date_format(date_create_from_format('Y-m-d', $top_news_latest->date), 'd-m-Y');
                                }
                            ?>
                            @if($top_news_latest->date != null)
                                <li><i class="fa fa-clock-o"></i>{{$top_news_latestDateString}}</li>
                            @endif
                            @if($top_news_latest->autor != null)
                                <li><i class="fa fa-user"></i>by {{$top_news_latest->autor}}</li>
                            @endif
                            <li>
                                <a href="{{route('news-details',['name'=>Str::slug($top_news_latest->name),'id'=>Crypt::encrypt($top_news_latest->id)])}}">
                                    <i class="fa fa-comments-o"></i>
                                    <span>{{$top_news_latest->refComment->count()}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
{{-- BEAKING NEWS --}}
@include('front-end.layouts.breaking-news')
{{-- BEAKING NEWS --}}

<section class="features-today">
    <div class="container">
        <div class="title-section">
            <h1><span>Today's News</span></h1>
        </div>
        <div class="features-today-box owl-wrapper">
            <div class="owl-carousel" data-num="4">
                <?php
                    $latest_news=App\Models\News::orderBy('created_at', 'desc')->with(['refCategory','refComment'])->get()
                ?>
                @foreach($latest_news as $latest_new)
                    <div class="item news-post standard-post">
                        <div class="post-gallery">
                            @if($latest_new->photo != null)
                                <img height= "260px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::photoURL($latest_new->photo) }}" alt="{{$latest_new->name}}">
                            @else
                                <img height= "260px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                            @endif
                            @if($latest_new->refCategory != null)
                                <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($latest_new->refCategory->name),'id'=>Crypt::encrypt($latest_new->refCategory->id)]) }}">{{$latest_new->refCategory->name}}</a>
                            @endif

                        </div>
                        <div class="post-content">
                            <h2><a href="{{route('news-details',['name'=>Str::slug($latest_new->name),'id'=>Crypt::encrypt($latest_new->id)])}}">{{$latest_new->name}}</a></h2>
                            <ul class="post-tags">
                                <?php
                                    if($latest_new->date != null){
                                        $newDateString = date_format(date_create_from_format('Y-m-d', $latest_new->date), 'd-m-Y');
                                }
                                ?>
                                @if($latest_new->date != null)
                                    <li><i class="fa fa-clock-o"></i>{{$newDateString}}</li>
                                @endif
                                @if($latest_new->autor != null)
                                    <li><i class="fa fa-user"></i>by <a href="#">{{$latest_new->autor}}</a></li>
                                @endif
                                <li><a href="{{route('news-details',['name'=>Str::slug($latest_new->name),'id'=>Crypt::encrypt($latest_new->id)])}}"><i class="fa fa-comments-o"></i><span>{{$latest_new->refComment->count()}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="block-content">
                    <div class="carousel-box owl-wrapper">

                        <div class="title-section">
                            <h1><span>NGO</span></h1>
                        </div>
                        <?php
                            $ngo_news=App\Models\News::where('ref_category',3)->orderBy('created_at', 'desc')->with(['refCategory','refComment'])->get()
                        ?>
                        <div class="owl-carousel" data-num="2">
                            @foreach ($ngo_news as $ngo_new)
                            <div class="item">
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        @if($ngo_new->photo != null)
                                           <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::photoURL($ngo_new->photo) }}" alt="{{$ngo_new->name}}">
                                        @else
                                            <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                        @endif
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                @if($ngo_new->refCategory != null)
                                                    <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($ngo_new->refCategory->name),'id'=>Crypt::encrypt($ngo_new->refCategory->id)]) }}">{{$ngo_new->refCategory->name}}</a>
                                                @endif
                                                <h2>
                                                    <a href="{{route('news-details',['name'=>Str::slug($ngo_new->name),'id'=>Crypt::encrypt($ngo_new->id)])}}">{{$ngo_new->name}}</a>
                                                </h2>
                                                <?php
                                                    if($ngo_new->date != null){
                                                        $ngoDateString = date_format(date_create_from_format('Y-m-d', $ngo_new->date), 'd-m-Y');
                                                    }
                                                ?>
                                                <ul class="post-tags">
                                                    @if($ngo_new->date != null)
                                                        <li><i class="fa fa-clock-o"></i>{{$ngoDateString}}</li>
                                                    @endif
                                                    <li><a href="{{route('news-details',['name'=>Str::slug($ngo_new->name),'id'=>Crypt::encrypt($ngo_new->id)])}}"><i class="fa fa-comments-o"></i><span>{{$ngo_new->refComment->count()}}</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-box owl-wrapper">
                        <div class="title-section">
                            <h1><span>NGO Gallery</span></h1>
                        </div>
                        <div class="owl-carousel" data-num="3">
                            <?php
                                $ngo_galleries=App\Models\NgoGallery::orderBy('created_at', 'desc')->get()
                            ?>
                            @foreach ($ngo_galleries as $ngo_gallery)
                                <div class="item news-post image-post3">
                                    @if($ngo_gallery->photo != null)
                                        <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::photoURL($ngo_gallery->photo) }}" alt="{{$ngo_gallery->caption}}">
                                    @else
                                        <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                    @endif
                                    <div class="hover-box">
                                        <h2><a href="#">{{$ngo_gallery->caption}}</a></h2>
                                        <?php
                                            if($ngo_gallery->date != null){
                                                $ngoGalleryDateString = date_format(date_create_from_format('Y-m-d', $ngo_gallery->date), 'd-m-Y');
                                            }
                                        ?>
                                        @if($ngo_gallery->date != null)
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{$ngoGalleryDateString}}</li>
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-box owl-wrapper">

                        <div class="title-section">
                            <h1><span>Health Care</span></h1>
                        </div>
                        <?php
                            $health_news=App\Models\News::where('ref_category',6)->orderBy('created_at', 'desc')->with(['refCategory','refComment'])->get()
                        ?>
                        <div class="owl-carousel" data-num="2">
                            @foreach ($health_news as $health_new)
                            <div class="item">
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        @if($health_new->photo != null)
                                           <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::photoURL($health_new->photo) }}" alt="{{$health_new->name}}">
                                        @else
                                            <img height= "251px" width= "100%" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                        @endif
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                @if($health_new->refCategory != null)
                                                    <a class="category-post world" href="{{ route('category',['category_name'=>Str::slug($health_new->refCategory->name),'id'=>Crypt::encrypt($health_new->refCategory->id)]) }}">{{$health_new->refCategory->name}}</a>
                                                @endif
                                                <h2>
                                                    <a href="{{route('news-details',['name'=>Str::slug($health_new->name),'id'=>Crypt::encrypt($health_new->id)])}}">{{$health_new->name}}</a>
                                                </h2>
                                                <?php
                                                    if($health_new->date != null){
                                                        $healthDateString = date_format(date_create_from_format('Y-m-d', $health_new->date), 'd-m-Y');
                                                    }
                                                ?>
                                                <ul class="post-tags">
                                                    @if($health_new->date != null)
                                                        <li><i class="fa fa-clock-o"></i>{{$healthDateString}}</li>
                                                    @endif
                                                    <li><a href="{{route('news-details',['name'=>Str::slug($health_new->name),'id'=>Crypt::encrypt($health_new->id)])}}"><i class="fa fa-comments-o"></i><span>{{$health_new->refComment->count()}}</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- SIDE BAR --}}
            @include('front-end.layouts.ridgt-side-bar')
            {{-- SIDE BAR --}}
        </div>
    </div>
</section>
<section class="feature-video">
    <div class="container">
        <div class="title-section white">
            <h1><span>Social Video</span></h1>
        </div>
        <div class="features-video-box owl-wrapper">
            <div class="owl-carousel" data-num="4">
                <?php
                    $social_videos=App\Models\SocialVideo::orderBy('created_at', 'desc')->get()
                ?>
                @foreach ($social_videos as $social_video)
                <div class="item news-post video-post">
                    @if ($social_video->video=="")
                        <img src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}"/>
                    @else
                        <video height="100%" width="100%" controls>
                            <source src="{{ \App\Http\Controllers\ExtraController::photoURL($social_video->video) }}" type="video/mp4">
                        </video>
                    @endif
                    <div class="hover-box">
                        <h2>{{$social_video->caption}}</h2>
                        <ul class="post-tags">
                            <?php
                                if($social_video->date != null){
                                    $socialVideoDateString = date_format(date_create_from_format('Y-m-d', $social_video->date), 'd-m-Y');
                                }
                            ?>
                            @if($social_video->date != null)
                                <li><i class="fa fa-clock-o"></i>{{$socialVideoDateString}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop
