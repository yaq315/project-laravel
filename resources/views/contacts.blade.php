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

<!-- Contact Form and Info Section -->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-map-alt"></i></span>
                    <div class="media-body">
                        <h3>Wadi Rum, Jordan</h3>
                        <p>Rum Village, Near the Visitor Center</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:+962780784562">+96200000000</a></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:info@rumquest.com">info@rumquest.com</a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8 col-lg-9">
                <form action="{{ route('contact.store') }}" method="POST" class="row contact_form">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control different-control" name="message" id="message" rows="5" placeholder="Enter Message" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="button-contact">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Google Map -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.676635350646!2d35.416315315115!3d30.039345981883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1501c7a2a5e5b5b5%3A0x5f5f5f5f5f5f5f5f!2sWadi%20Rum%20Visitor%20Center!5e0!3m2!1sen!2sjo!4v1633024000000!5m2!1sen!2sjo"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection