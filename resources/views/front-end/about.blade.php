@extends('front-end.layouts.app')
@section('title')
    About Us
@endsection
@section('body-content')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- block content -->
                <div class="block-content">
                    <?php
                        $about=App\Models\Content::first()
                    ?>
                    {!! (isset($about)&&$about->about)? $about->about: '' !!}
                </div>
            </div>
           {{-- SIDE BAR --}}
           @include('front-end.layouts.ridgt-side-bar')
           {{-- SIDE BAR --}}
        </div>

    </div>
</section>
@stop
