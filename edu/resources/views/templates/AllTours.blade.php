<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2>Educational Tours</h2>
                        <div class="page_link">
                            <a href="{{ route('homePage') }}">Home</a>
                            <a href="#">Tours</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@php
    $tours = getPostsByPostType('tour', 10, 'new', true, true);
@endphp

<style>
    .tour-card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .tour-card-container .tour-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .tour-card-container .tour-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .tour-card-container .tour-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }

    .tour-card-container .tour-card-body {
        padding: 15px;
    }

    .tour-card-container .tour-card-body h5 {
        font-size: 16px;
        margin: 0 0 8px;
        font-weight: 600;
    }

    .tour-card-container .tour-card-body a {
        font-size: 14px;
        text-decoration: none;
        color: #007bff;
        font-weight: 500;
    }

    .tour-card-container .tour-card-body a:hover {
        text-decoration: underline;
    }
</style>
<div class="popular_courses section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title">
                    <h2 class="mb-3">Our Most Popular Adventures</h2>
                    <p>
                        Explore our hot selling tours and get Yours
                    </p>
                </div>
            </div>
        </div>
        <div class="tour-card-container">

            @foreach ($tours as $tour)
                <div class="tour-card">
                    <img src="{{ publicPath($tour->post_image) }}" alt="{{ $tour->post_image_alt }}">
                    <div class="tour-card-body">
                        <h5>{{ $tour->post_title }}</h5>
                        <a
                            href="{{ route('single.post', ['post_type' => $tour->post_type, 'slug' => $tour->post_name]) }}">Explore
                            More →</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<div class="popular_courses section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Past Tours</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel active_course">

                    <div class="single_course">
                        <div class="course_head">
                            <img class="img-fluid" src="{{ publicPath('/themeAssets/img/courses/c1.jpg') }}"
                                alt="" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_gap registration_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <h1 class="mb-3">Students</h1>
                        <p>
                            At ApplicationUni, we connect students with programs and institutions that align with their
                            background,
                            skills, and ambitions. Our platform helps you choose the right education path, providing
                            support every
                            step of the way. With our AI-powered eligibility check, get matched with institutions that
                            suit your
                            aspirations and apply with ease.
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="register_form">
                    <h3>Explore Tours</h3>
                    <p>It is high time for Educational Tours</p>
                    <a href="#" class="primary-btn ml-sm-3 ml-0">View</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="feature_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Our Impact</h2>
                    <p>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-student"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">180+</h4>
                        <p>
                            Trusted by 180+ Schools Across India for Seamless Educational Tours Worldwide!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-book"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">3800</h4>
                        <p>
                            Inspiring Minds, One Journey at a Time - Over 3,800 Indian Students Empowered Through Global
                            Educational
                            Adventures
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-earth"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">100%</h4>
                        <p>
                            Delivering 100% Customer Satisfaction for Schools with Unmatched Educational Tour
                            Experiences within
                            India and UAE!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
