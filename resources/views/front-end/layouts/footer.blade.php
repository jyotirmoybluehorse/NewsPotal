<footer>
    <div class="container">
        <div class="footer-widgets-part">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget text-widget">
                        <?php
                            $about=App\Models\Content::first()
                        ?>
                        {!! (isset($about)&&$about->footer_about)? $about->footer_about: '' !!}
                    </div>
                    <div class="widget social-widget">
                        <h1>Stay Connected</h1>
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
                <div class="col-md-3">
                    <div class="widget posts-widget">
                        <h1>QUICK LINKS</h1>
                        <ul class="list-posts">
                            <li><a href="{{route('main-page')}}">HOME</a></li>
                            <li><a href="{{route('about-us')}}">About Us</a></li>
                            <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget categories-widget">
                        <h1>Categories</h1>
                        <ul class="category-list">
                            <?php
                                $_categories = App\Models\Category::get()
                            ?>
                            @foreach ($_categories as $_category)
                                <li><a  href="{{ route('category',['category_name'=>Str::slug($_category->name),'id'=>Crypt::encrypt($_category->id)]) }}">{{$_category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget flickr-widget">
                        <h1>AIM FOUNDATION IMAGES</h1>
                        <ul class="flickr-list">
                            <?php
                                $aim_phtos=App\Models\AimindiaPhoto::orderBy('created_at', 'desc')->get();
                            ?>
                            @foreach ($aim_phtos as $aim_phto)
                            <li>
                                <img height= "100px" width= "123px" src="{{ \App\Http\Controllers\ExtraController::photoURL($aim_phto->photo) }}" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-last-line">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; COPYRIGHT NEWS</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="{{route('main-page')}}">Home</a></li>
                            <li><a href="{{route('about-us')}}">About</a></li>
                            <li><a href="{{route('contact-us')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.migrate.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.bxslider.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.magnific-popup.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.ticker.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.imagesloaded.min.js') }}"></script>
  	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/jquery.isotope.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/retina-1.1.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/plugins-scroll.js') }}"></script>
	<script type="text/javascript" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/js/script.js') }}"></script>
</footer>
