@extends('front-end.layouts.app')
@section('title')
    {{$name}}
@endsection
@section('body-content')
@include('front-end.layouts.breaking-news')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- block content -->
                <div class="block-content">
                    <!-- single-post box -->
                    <div class="single-post-box">
                        <div class="title-post">
                            <h1>{{$item->name}}</h1>
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
                            {{-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li> --}}
                            </ul>
                        </div>
                        <div class="share-post-box">
                            <span><i class="fa fa-share-alt"></i></span><span> Share Post</span>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>

                            {{-- <ul class="share-box">
                                <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
                            </ul> --}}
                        </div>
                        <div class="post-gallery">
                            @if($item->photo != null)
                                <img src="{{ \App\Http\Controllers\ExtraController::photoURL($item->photo) }}" alt="{{$item->name}}">
                            @else
                                <img src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                            @endif
                            <span class="image-caption">{{$item->name}}</span>
                        </div>
                        <div class="post-content">
                            {!! $item->description !!}
                        </div>
                        <div class="share-post-box">
                            <span><i class="fa fa-share-alt"></i></span><span> Share Post</span>
                            <div class="addthis_inline_share_toolbox"></div>
                            {{-- <ul class="share-box">
                                <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Facebook</a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i>Share on Twitter</a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
                            </ul> --}}
                        </div>
                        @if($item->refCategory != null)
                            <div class="about-more-autor">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#about-autor" data-toggle="tab" style="width: 200%;">More From {{$item->refCategory->name}}</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about-autor">
                                        <div class="more-autor-posts">
                                            <?php
                                                $category_news =App\Models\News::where('ref_category',$item->refCategory->id)->with(['refCategory'])->latest()->take(4)->get()
                                            ?>
                                            @foreach ($category_news as $category_new)
                                                <div class="news-post image-post3">
                                                    @if($category_new->photo != null)
                                                        <img height= "160px" width= "181px" src="{{ \App\Http\Controllers\ExtraController::photoURL($category_new->photo) }}" alt="{{$category_new->name}}">
                                                    @else
                                                        <img height= "160px" width= "181px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                                    @endif
                                                    <div class="hover-box">
                                                        <h2><a href="{{route('news-details',['name'=>Str::slug($category_new->name),'id'=>Crypt::encrypt($category_new->id)])}}">{{$category_new->name}}</a></h2>
                                                        <ul class="post-tags">
                                                            <?php
                                                            if($category_new->date != null){
                                                                $top_news_latestDateString = date_format(date_create_from_format('Y-m-d', $category_new->date), 'd-m-Y');
                                                            }
                                                            ?>
                                                            @if($category_new->date != null)
                                                                <li><i class="fa fa-clock-o"></i>{{$top_news_latestDateString}}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>You may also like</span></h1>
                            </div>
                            <div class="owl-carousel" data-num="3">

                                <?php
                                    $all_news=App\Models\News::orderBy('created_at', 'desc')->with(['refCategory'])->latest()->take(10)->get()
                                ?>
                                @foreach ($all_news as $all_new)
                                    <div class="item news-post image-post3">
                                        @if($all_new->photo != null)
                                            <img height= "160px" width= "181px" src="{{ \App\Http\Controllers\ExtraController::photoURL($all_new->photo) }}" alt="{{$all_new->name}}">
                                        @else
                                            <img height= "160px" width= "181px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" alt="No Image">
                                        @endif
                                        <div class="hover-box">
                                            <h2><a href="{{route('news-details',['name'=>Str::slug($all_new->name),'id'=>Crypt::encrypt($all_new->id)])}}">{{$all_new->name}}</a></h2>
                                            <ul class="post-tags">
                                                <?php
                                                if($all_new->date != null){
                                                    $all_new_latestDateString = date_format(date_create_from_format('Y-m-d', $all_new->date), 'd-m-Y');
                                                }
                                                ?>
                                                @if($all_new->date != null)
                                                    <li><i class="fa fa-clock-o"></i>{{$all_new_latestDateString}}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End carousel box -->

                        <!-- contact form box -->
                        <div class="contact-form-box">
                            <div class="title-section">
                                <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
                            </div>
                            @include('front-end.layouts.alert')
                            <form id="comment-form" action="{{route('comment',$item->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Name*</label>
                                        <input  name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mail">E-mail*</label>
                                        <input id="mail" name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="website">Contact Number</label>
                                        <input id="website" name="phone" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <label for="comment">Comment*</label>
                                <textarea id="comment" name="comment"></textarea>
                                <button type="submit" id="submit-contact">
                                    <i class="fa fa-comment"></i> Post Comment
                                </button>
                            </form>
                        </div>
                        <!-- End contact form box -->

                    </div>
                    <!-- End single-post box -->

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
