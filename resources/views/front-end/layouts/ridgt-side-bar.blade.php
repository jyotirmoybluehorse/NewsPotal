<div class="col-sm-4">
    <div class="sidebar">
        <div class="widget social-widget">
            <div class="title-section">
                <h1><span>Stay Connected</span></h1>
            </div>
            <ul class="social-share">
                <?php
                    $subscriber_count=App\Models\Subscribe::count();
                    $about=App\Models\Content::first();
                ?>
                <li>
                    <a href="#subcribe" class="rss"><i class="fa fa-rss"></i></a>
                    <span class="number">{{$subscriber_count}}</span>
                    <span>Subscribers</span>
                </li>
                @if($about != null)
                    @if($about->facebook)
                        <li>
                            <a href="{{$about->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a>
                            <span class="number">56,743</span>
                            <span>Fans</span>
                        </li>
                    @endif
                    @if($about->google)
                        <li>
                            <a href="{{$about->google}}" class="google"><i class="fa fa-google-plus"></i></a>
                            <span class="number">35,003</span>
                            <span>Followers</span>
                        </li>
                    @endif
                    @if($about->twiter)
                        <li>
                            <a href="{{$about->twiter}}" class="twitter"><i class="fa fa-twitter"></i></a>
                            <span class="number">43,501</span>
                            <span>Followers</span>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <div class="widget features-slide-widget">
            {{-- <div class="title-section">
                <h1><span>Featured Posts</span></h1>
            </div> --}}
            <?php
                $advertisements=App\Models\Advertisement::where('category','UNPAID')->orderBy('created_at', 'desc')->get()
            ?>
            <div class="image-post-slider">
                <ul class="bxslider">
                    @foreach ($advertisements as $advertisement)
                        <li>
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{ \App\Http\Controllers\ExtraController::photoURL($advertisement->photo) }}" alt="Advertisement">
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget subscribe-widget" >
            @include('front-end.layouts.alert')
            <form class="subscribe-form" action="{{route('subscribe')}}" method="POST" id="subcribe">
                @csrf
                <h1>Subscribe to RSS Feeds</h1>
                <input type="email" class="form-control" name="email" id="subscribe" placeholder="Enter Your Mail Address"/>
                <button id="submit-subscribe" type="submit">
                    <i class="fa fa-arrow-circle-right"></i>
                </button>
                <p>Get all latest content delivered to your email a few times a month.</p>
            </form>
        </div>
        <?php
            $top_advertisement=App\Models\Advertisement::where('category','PAID')->latest()->first()
        ?>
        @if($top_advertisement != null)
        <div class="advertisement">
            <div class="desktop-advert">
                <span>Advertisement</span>
                <img height= "206px" width= "334px" src="{{ \App\Http\Controllers\ExtraController::photoURL($top_advertisement->photo) }}" alt="Advertisement">
            </div>
            <div class="tablet-advert">
                <span>Advertisement</span>
                <img src="{{ \App\Http\Controllers\ExtraController::photoURL($top_advertisement->photo) }}" alt="Advertisement">
            </div>
            <div class="mobile-advert">
                <span>Advertisement</span>
                <img src="{{ \App\Http\Controllers\ExtraController::photoURL($top_advertisement->photo) }}" alt="Advertisement">
            </div>
        </div>
        @endif
    </div>
    <!-- End sidebar -->
</div>
