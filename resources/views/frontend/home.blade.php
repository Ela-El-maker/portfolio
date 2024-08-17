@extends('frontend.layouts.layout')


@section('content')
    <!-- Header-Area-Start -->
    @include('frontend.sections.hero')
    <!-- Header-Area-End -->

    <!-- Service-Area-Start -->
    @include('frontend.sections.service')
    <!-- Service-Area-End -->

   
    <!-- Future-Area-Start -->
    @include('frontend.sections.future')
    <!-- Future-Area-End -->
	
 <!-- Now-Area-Start -->
    @include('frontend.sections.now')
    <!-- Now-Area-End -->



    <!-- growth-Area-Start -->
    @include('frontend.sections.personal-program')
    <!-- growth-Area-End -->

    <!-- About-Area-Start -->
    @include('frontend.sections.about')
    <!-- About-Area-End -->

    <!-- Portfolio-Area-Start -->
    @include('frontend.sections.portfolio')
    <!-- Portfolio-Area-End -->

    <!-- Skills-Area-Start -->
    @include('frontend.sections.skill')
    <!-- Skills-Area-End -->

    <!-- Experience-Area-Start -->
    @include('frontend.sections.experience')
    <!-- Experience-Area-End -->

    <!-- Testimonial-Area-Start -->
    @include('frontend.sections.testimonial')
    <!-- Testimonial-Area-End -->

    <!-- Blog-Area-Start -->
    @include('frontend.sections.blog')
    <!-- Blog-Area-End -->

    <!-- Contact-Area-Start -->
    @include('frontend.sections.contact')
    <!-- Contact-Area-End -->
@endsection
