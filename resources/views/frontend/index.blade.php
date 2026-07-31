@extends('frontend.home_master')
@section('home')


			<!-- Home Banner -->
		@include('frontend.layout.banner')
			<!-- /Home Banner -->

			<!-- List -->
		@include('frontend.layout.list')	
			<!-- /List -->

			<!-- Speciality Section -->
		@include('frontend.layout.speciality')	
			<!-- /Speciality Section -->

			<!-- Doctor Section -->
		@include('frontend.layout.doctor')	
			<!-- /Doctor Section -->

			<!-- Services Section -->
		@include('frontend.layout.services')	
			<!-- /Services Section -->

			<!-- Reasons Section -->
		@include('frontend.layout.reasons')
			<!-- /Reasons Section -->

			<!-- Bookus Section -->
		@include('frontend.layout.bookus')	
			<!-- /Bookus Section -->
			
			<!-- Testimonial Section -->
		@include('frontend.layout.testimonial')	
			<!-- /Testimonial Section -->

		@include('frontend.layout.trusted')	

		@include('frontend.layout.faq')	

			<!-- App Section -->
		@include('frontend.layout.appsection')	
			<!-- /App Section -->

			<!-- Article Section -->
		@include('frontend.layout.article')	
			<!-- /Article Section -->

			<!-- Info Section -->
		@include('frontend.layout.info')	
			<!-- /Info Section -->

@endsection