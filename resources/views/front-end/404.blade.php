@extends('front-end.layouts.app')
@section('title')
    404 Not Found
@endsection
@section('body-content')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- block content -->
                <div class="block-content">
                    <!-- error box -->
                    <div class="error-box">
                        <div class="error-banner">
                            <h1>Error <span>404</span></h1>
                            <p>Oops! It looks like nothing was found at this location.</p>
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
@stop
