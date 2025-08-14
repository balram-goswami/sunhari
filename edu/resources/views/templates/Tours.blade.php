<style>
    body {
        background: #f8f9fa;
    }

    .tour-box {
        padding: 60px 0;
    }

    .itinerary-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .itinerary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .itinerary-img {
        border-bottom: 4px solid #f5d626;
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .itinerary-card h4 {
        color: #000;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .itinerary-card p {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .section-title {
        color: #000;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
        font-size: 1.8rem;
    }
</style>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9ff;
        margin: 0;
        padding: 0;
    }

    .inclusions-section {
        padding: 60px 20px;
        text-align: center;
    }

    .inclusions-section h2 {
        font-size: 2.2rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 40px;
        position: relative;
        display: inline-block;
    }

    .inclusions-section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: #4e73df;
        border-radius: 2px;
    }

    .inclusions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .inclusion-card {
        background-color: white;
        padding: 25px 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .inclusion-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .icon-box {
        width: 60px;
        height: 60px;
        background-color: #eaf0ff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        margin: 0 auto 15px;
    }

    .icon-box img {
        width: 28px;
        height: 28px;
    }

    .inclusion-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .inclusion-text {
        font-size: 0.9rem;
        color: #555;
        line-height: 1.5;
    }
</style>

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2>{{ $post['extraFields']['page_title'] ?? 'Title' }}</h2>
                        <div class="page_link">
                            <a href="{{ route('homePage') }}">{{ $post['extraFields']['page_text'] ?? 'Text' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tour-box">
    <div class="container">
        <h3 class="section-title">Tour Itinerary</h3>
        <div class="row g-4">

            @for ($i = 1; $i <= 10; $i++)
                @php
                    $title = $post['extraFields']["step_{$i}_title"] ?? null;
                    $text = $post['extraFields']["step_{$i}_text"] ?? null;
                    $img = $post['extraFields']["step_{$i}_img"] ?? null;
                @endphp

                @if ($title && $text)
                    <div class="col-md-4 mb-4">
                        <div class="itinerary-card">
                            <img class="itinerary-img" src="{{ $img ? asset($img) : asset('img/courses/default.jpg') }}"
                                alt="{{ $title }}">
                            <div class="p-3">
                                <h4>{{ $title }}</h4>
                                <p>{{ $text }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor

        </div>
    </div>
</div>

<section class="inclusions-section">
    <h2>Inclusions</h2>
    <div class="inclusions-grid">
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" alt="Flights"></div>
            <div class="inclusion-title">Flights</div>
            <div class="inclusion-text">Complete flight arrangements for journey</div>
        </div>
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/3095/3095583.png" alt="Visa">
            </div>
            <div class="inclusion-title">Visa Fees</div>
            <div class="inclusion-text">All visa processing and fees included</div>
        </div>
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/595/595800.png" alt="Hotel"></div>
            <div class="inclusion-title">Hotel Stay</div>
            <div class="inclusion-text">Comfortable stays with essential facilities</div>
        </div>
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/857/857681.png" alt="Food"></div>
            <div class="inclusion-title">Food</div>
            <div class="inclusion-text">Customized meal plans as preferences</div>
        </div>
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/854/854929.png" alt="Coach"></div>
            <div class="inclusion-title">Coach and Driver</div>
            <div class="inclusion-text">Dedicated transportation services</div>
        </div>
        <div class="inclusion-card">
            <div class="icon-box"><img src="https://cdn-icons-png.flaticon.com/512/432/432408.png" alt="Entrance"></div>
            <div class="inclusion-title">Entrance Fees</div>
            <div class="inclusion-text">Access to all attractions covered</div>
        </div>
    </div>
</section>
