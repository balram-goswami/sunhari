@php
    $currentUser = getCurrentUser();
@endphp

<style>
    
    .dashboard-card {
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }
    .dashboard-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4">
        <!-- Welcome Card -->
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="row g-0 align-items-center">
                    <div class="col-md-7 p-4">
                        <h5 class="card-title text-primary fw-bold mb-2">
                            Welcome, {{ $currentUser->name }} 🎉
                        </h5>
                        <p class="text-muted mb-0">Here’s a quick overview of your system stats.</p>
                    </div>
                    <div class="col-md-5 text-center p-3">
                        <img src="{{ asset('assets/img/icons/1.png') }}" 
                             class="img-fluid" 
                             style="max-height: 120px;" 
                             alt="User Badge">
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 text-center dashboard-card">
                <div class="card-body">
                    <h6 class="fw-semibold">Users</h6>
                    <p class="text-success fw-bold mb-1">{{ $userCount }}</p>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">View More</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 text-center dashboard-card">
                <div class="card-body">
                    <h6 class="fw-semibold">Queries</h6>
                    <p class="text-success fw-bold mb-1">{{ $enquiryCount }}</p>
                    <a href="{{ route('feedbacks.index') }}" class="btn btn-sm btn-outline-primary">View More</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 text-center dashboard-card">
                <div class="card-body">
                    <h6 class="fw-semibold">Subscribers</h6>
                    <p class="text-success fw-bold mb-1">{{ $subscribersCount }}</p>
                    <a href="{{ route('subscribers.index') }}" class="btn btn-sm btn-outline-primary">View More</a>
                </div>
            </div>
        </div>

        @foreach ($postCounts as $postCount)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 text-center dashboard-card">
                    <div class="card-body">
                        <h6 class="fw-semibold">{{ $postCount['postTitle'] }}</h6>
                        <p class="text-success fw-bold mb-1">{{ $postCount['postCount'] }}</p>
                        <a href="{{ route('post.index', ['postType' => $postCount['postType']]) }}" 
                           class="btn btn-sm btn-outline-primary">View More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
