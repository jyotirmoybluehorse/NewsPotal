@extends('front-end.layouts.app')
@section('title')
    Contact us
@endsection
@section('body-content')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="block-content">

                    <!-- End contact info box -->

                    <!-- contact form box -->
                    <div class="contact-form-box">
                        <div class="title-section">
                            <h1><span>Talk to us</span></h1>
                        </div>
                        @include('front-end.layouts.alert')
                        <form id="contact-form" action="{{route('contact-us')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Name*</label>
                                <input  name="name" value="{{old('name')}}" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="mail">E-mail*</label>
                                    <input id="mail" name="email" value="{{old('email')}}" type="email" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="website">Contact Number</label>
                                    <input id="website" name="phone" value="{{old('phone')}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <label for="comment">Your Message*</label>
                            <textarea id="comment" name="comment" required></textarea>
                            <button type="submit" id="submit-contact">
                                <i class="fa fa-paper-plane"></i> Send Message
                            </button>
                        </form>
                    </div>
                    <!-- End contact form box -->

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
