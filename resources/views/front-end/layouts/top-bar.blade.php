<header class="clearfix">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="top-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="top-line-list">
                            <li>
                                <?php
                                    $about=App\Models\Content::first()
                                ?>
                                <span class="city-weather">{{(isset($about)&&$about->address)? $about->address: ''}}</span>
                            </li>
                            <?php
                            $date = Carbon\Carbon::now();
                            $today_time = $date->toRfc850String()
                            ?>
                            <li><span class="time-now">{{$today_time}}</span></li>
                            <li><a href="{{route('advertisement')}}">Advertisement With Us</a></li>
                            <li><a href="{{route('contact-us')}}">Contact</a></li>
                            <li><a href="mailto: {{(isset($about)&&$about->email)? $about->email: ''}}">Mail Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="social-icons">
                            @if($about != null)
                                @if($about->facebook)
                                    <li><a href="{{$about->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($about->google)
                                    <li><a href="{{$about->google}}" class="google"><i class="fa fa-google-plus"></i></a></li>
                                @endif
                                @if($about->twiter)
                                    <li><a href="{{$about->twiter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if($about->linkdin)
                                    <li><a href="{{$about->linkdin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                @endif
                            @endif
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-advertisement">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('main-page')}}">
                        <img src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/images/logo.png') }}" alt="">
                    </a>
                </div>
                <?php
                    $advertisements_top_bar=App\Models\Advertisement::where('category','TOPBAR')->latest()->first()
                ?>
                @if($advertisements_top_bar != null)
                    <div class="advertisement">
                        <div class="desktop-advert">
                            <span>Advertisement</span>
                            <img src="{{ \App\Http\Controllers\ExtraController::photoURL($advertisements_top_bar->photo) }}" alt="Advertisement">
                        </div>
                        <div class="tablet-advert">
                            <span>Advertisement</span>
                            <img src="{{ \App\Http\Controllers\ExtraController::photoURL($advertisements_top_bar->photo) }}" alt="Advertisement">
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="nav-list-container">
            <div class="container">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li @if((\Request::route()->getName() == 'main-page')) class="active" @endif>
                            <a class="home" href="{{route('main-page')}}">Home</a>
                        </li>
                        <?php
                        $news_categories = App\Models\Category::get();
                        $social__head_videos=App\Models\SocialVideo::orderBy('created_at', 'desc')->get();
                        ?>
                        @foreach ($news_categories as $news_category)
                            <li><a class="world" href="{{ route('category',['category_name'=>Str::slug($news_category->name),'id'=>Crypt::encrypt($news_category->id)]) }}">{{$news_category->name}}</a></li>
                        @endforeach
                        <li>
                            <a class="video" href="#">Social</a>
                            <div class="megadropdown">
                                <div class="container">
                                    <div class="inner-megadropdown video-dropdown">
                                        <div class="owl-wrapper">
                                            <h1>Latest Posts</h1>
                                            <div class="owl-carousel" data-num="4">
                                                @foreach($social__head_videos as $video)
                                                    <div class="item news-post video-post">
                                                        @if ($video->video=="")
                                                            <img src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}"/>
                                                        @else
                                                            <video height="100%" width="100%" controls>
                                                                <source src="{{ \App\Http\Controllers\ExtraController::photoURL($video->video) }}" type="video/mp4">
                                                            </video>
                                                        @endif
                                                        <div class="hover-box">
                                                            <h2>{{$video->caption}}</h2>
                                                            <ul class="post-tags">
                                                                <?php
                                                                    if($video->date != null){
                                                                        $videoDateString = date_format(date_create_from_format('Y-m-d', $video->date), 'd-m-Y');
                                                                    }
                                                                ?>
                                                                @if($video->date != null)
                                                                    <li><i class="fa fa-clock-o"></i>{{$videoDateString}}</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a class="sport" href="{{route('about-us')}}">About Us</a></li>
                        <li><a class="sport" href="{{route('contact-us')}}">Contact Us</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search" action="{{route('search')}}">
                        @csrf
                        <input type="text" id="search" name="qe" value="{{ (isset($qe)&&$qe)? $qe: '' }}" placeholder="Search here">
                        <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
