@php
    $contact = getThemeOptions('footer');
@endphp

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2>Contact Us</h2>
                        <div class="page_link">
                            <a href="{{ route('homePage')}}">Home</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area">
    <div class="container">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?hl=en&amp;q={{ $contact['address'] }}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                </iframe>
            </div>
        </div>

        <style>
            .mapouter {
                position: relative;
                text-align: right;
                width: 100%;
                height: 0;
                padding-bottom: 33%;
                /* Aspect ratio 3:1 for desktop look */
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
            }

            .gmap_iframe {
                width: 100% !important;
                height: 100% !important;
                border: 0;
            }

            /* Adjust aspect ratio for smaller devices */
            @media (max-width: 768px) {
                .mapouter {
                    padding-bottom: 56.25%;
                    /* 16:9 for mobile */
                }
            }
        </style>

        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="ti-home"></i>
                        @if (isset($contact['address']))
                            <h6>{{ $contact['address'] }}</h6>
                        @endif
                        <p>Office Address</p>
                    </div>
                    <div class="info_item">
                        <i class="ti-headphone"></i>
                        @if (isset($contact['number1']))
                            <h6><a href="tel:{{ $contact['number1'] }}">{{ $contact['number1'] }}</a></h6>
                        @endif
                        @if (isset($contact['number2']))
                            <h6><a href="tel:{{ $contact['number2'] }}">{{ $contact['number2'] }}</a></h6>
                        @endif
                        <p>{{ $contact['timing'] ?? 'Mon to Fri 9am to 6 pm' }}</p>
                    </div>
                    <div class="info_item">
                        <i class="ti-email"></i>
                        <h6><a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] ?? 'Examplr@mail.com' }}</a>
                        </h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                    novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter your name'" required="" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter email address" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter email address'" required="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Enter Subject" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Subject'" required="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn primary-btn">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
