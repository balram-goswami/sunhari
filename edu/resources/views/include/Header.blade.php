@php
    $headerOption = getThemeOptions('header');
    $headerMenuOptions = getChildMenus('primary_menu');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ publicPath($headerOption['headerfavicon'] ?? 'img/favicon.png') }}" type="image/png" />
    <title>{{ $headerOption['meta_title'] }}</title>

    <link rel="stylesheet" href="{{ publicPath('/themeAssets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ publicPath('/themeAssets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ publicPath('/themeAssets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ publicPath('/themeAssets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ publicPath('/themeAssets/vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ publicPath('/themeAssets/css/style.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>
</head>

<body>
    @if (request()->is('/'))
        <header class="header_area">
        @else
            <header class="header_area white-header">
    @endif
    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="" action="">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('homePage') }}">
                    @if(isset($headerOption['headerlogo']))
                    <img src="{{ publicPath($headerOption['headerlogo']) }}" alt="Site logo" style="height: 70px;" />
                    @else
                    <img src="{{ publicPath('/themeAssets/img/logo.jpg') }}" alt="Site logo" style="height: 70px;" />
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">

                        {{-- Home Link --}}
                        <li class="nav-item {{ request()->routeIs('homePage') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('homePage') }}">Home</a>
                        </li>

                        {{-- Dynamic Menu --}}
                        @foreach ($headerMenuOptions as $headerMenuOption)
                            <li
                                class="nav-item submenu dropdown 
                {{ request()->is(trim($headerMenuOption['link_url'], '/')) ? 'active' : '' }}
                {{ collect($headerMenuOption['childMenus'])->pluck('link_url')->contains(url()->current())? 'active': '' }}">

                                <a href="{{ $headerMenuOption['link_url'] }}" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $headerMenuOption['link_name'] }}
                                </a>

                                @if (!empty($headerMenuOption['childMenus']))
                                    <ul class="dropdown-menu">
                                        @foreach ($headerMenuOption['childMenus'] as $child)
                                            <li
                                                class="nav-item {{ request()->is(trim($child['link_url'], '/')) ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ $child['link_url'] }}">
                                                    {{ $child['link_name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                        {{-- Login Link --}}
                        <li class="nav-item {{ request()->routeIs('login.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('login.index') }}">Login</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
    </header>
