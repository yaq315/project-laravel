
@extends('layouts.contain-contact')

@section('title', 'Contact Us')

@section('content')

<!-- Banner Section -->
<section class="contact-banner-area" id="contact">
    <div class="container h-100">
        <div class="contact-banner">
            <div class="text-center">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info, Map & Form -->
<section class="section-margin">
    <div class="container">

        <!-- Contact Info Cards -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-map-alt"></i></span>
                    <div class="media-body">
                        <h3>Wadi Rum, Jordan</h3>
                        <p>Rum Village, Near the Visitor Center</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:+96200000000">+96200000000</a></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:info@rumquest.com">info@rumquest.com</a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map & Contact Form Side by Side -->
        <div class="row">
            <!-- Map -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="google-map h-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.685901409427!2d35.006303015555554!3d29.532048782095252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x150070fa45ad9621%3A0x2c3f4a3c8c23f0e1!2z2YXYt9i52YUg2KfZhNmF2YbYtNin2YTZitmE!5e0!3m2!1sar!2sjo!4v1712408538900!5m2!1sar!2sjo"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <form action="{{ route('contact.store') }}" method="POST" class="contact_form h-100 d-flex flex-column justify-content-between">
                    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{ route('contact.store') }}" method="POST" class="contact_form h-100 d-flex flex-column justify-content-between">
    @csrf
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control different-control" name="message" rows="5" placeholder="Enter Message" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="button-contact">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>


@endsection