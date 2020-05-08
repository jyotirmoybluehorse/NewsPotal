<!doctype html>
<html lang="en" class="no-js">
    @include('front-end.layouts.head')
    <body>
        <div id="container">
            @include('front-end.layouts.top-bar')
            @yield('body-content')
            @include('front-end.layouts.footer')
        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eb570c36e1d6e94"></script>
    </body>
</html>
