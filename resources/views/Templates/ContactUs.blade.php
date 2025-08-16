
<div id="page-content">
    <!-- Page Title -->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Contact Us</h1>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="map-section map">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.545329529938!2d-74.00601518459353!3d40.71277597933188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjAiTiA3NMKwMDAnMjQuMCJX!5e0!3m2!1sen!2sus!4v1622748194875!5m2!1sen!2sus" 
        height="350" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</div>

    <!-- Breadcrumb -->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="{{ url('/') }}" title="Back to home">Home</a>
            <span aria-hidden="true">›</span>
            <span>Contact Us</span>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="container my-5">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-8 mb-4">
                <h2>Drop Us A Line</h2>
                <p>We'd love to hear from you! Please fill out the form below and we'll get back to you shortly.</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="" method="post" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="tel" name="phone" placeholder="Phone Number" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="subject" placeholder="Subject" class="form-control" value="{{ old('subject') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <textarea name="message" rows="6" placeholder="Your Message" class="form-control" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <div class="open-hours">
                    <strong>Opening Hours</strong><br>
                    Mon - Sat: 9am - 11pm<br>
                    Sunday: 11am - 5pm
                </div>
                <hr>
                <ul class="list-unstyled">
                    <li><i class="icon anm anm-map-marker-al"></i> 123 Main Street, New York, USA</li>
                    <li><i class="icon anm anm-phone-s"></i> (123) 456-7890</li>
                    <li><i class="icon anm anm-envelope-l"></i> contact@yoursite.com</li>
                </ul>
            </div>
        </div>
    </div>
</div>
