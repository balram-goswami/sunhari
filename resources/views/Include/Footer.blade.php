@php
    $details = getThemeOptions('footer');
    $footerMenu = getChildMenus('footer_menu');
    $currentUser = getCurrentUser();
@endphp

<footer id="footer">
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                    <div class="display-table">
                        <div class="display-table-cell footer-newsletter">
                            <div class="section-header text-center">
                                <label class="h2"><span>sign up for </span>newsletter</label>
                            </div>
                            <form action="{{ route('subscribe.form') }}" method="POST" id="subscribeForm">
                                @csrf
                                <div class="input-group">
                                    <input type="email" class="input-group__field newsletter__input" name="email"
                                        placeholder="Email address" required>
                                    <span class="input-group__btn">
                                        <button type="submit" class="btn newsletter__submit" name="commit"
                                            id="Subscribe">
                                            <span class="newsletter__submit-text--large">Subscribe</span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <div id="subscribeMessage"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                    <div class="footer-social">
                        <ul class="list--inline site-footer__social-icons social-icons">
                            @if (!empty($details['facebook']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['facebook'] }}" target="_blank"
                                        title="Facebook">
                                        <i class="bi bi-facebook"></i>
                                        <span class="icon__fallback-text">Facebook</span>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($details['whatsApp']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['whatsApp'] }}" target="_blank"
                                        title="WhatsApp">
                                        <i class="bi bi-whatsapp"></i>
                                        <span class="icon__fallback-text">WhatsApp</span>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($details['instagram']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['instagram'] }}" target="_blank"
                                        title="Instagram">
                                        <i class="bi bi-instagram"></i>
                                        <span class="icon__fallback-text">Instagram</span>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($details['youTube']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['youTube'] }}" target="_blank"
                                        title="YouTube">
                                        <i class="bi bi-youtube"></i>
                                        <span class="icon__fallback-text">YouTube</span>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($details['snapChat']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['snapChat'] }}" target="_blank"
                                        title="Snapchat">
                                        <i class="bi bi-snapchat"></i>
                                        <span class="icon__fallback-text">Snapchat</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i>
                                <p>{{ $details['address'] ?? '' }}</p>
                            </li>
                            <li class="phone">
                                <i class="icon anm anm-phone-s"></i>
                                <p><a href="tel:{{ $details['number'] ?? '' }}" style="color: white">
                                        {{ $details['number'] ?? '' }}
                                    </a></p>
                            </li>
                            <li class="email">
                                <i class="icon anm anm-envelope-l"></i>
                                <p><a href="mailto:{{ $details['email'] ?? '' }}" style="color: white">
                                        {{ $details['email'] ?? '' }}
                                    </a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Useful Links</h4>
                        <ul>
                            {{-- Dynamic footer menu items --}}
                            @foreach ($footerMenu as $menuItem)
                                <li>
                                    <a href="{{ $menuItem['link_url'] ?? '#' }}">
                                        {{ $menuItem['link_name'] ?? 'Untitled' }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- Show My Account link based on user role --}}
                            @auth
                                @if ($currentUser->role === \App\Models\User::USER)
                                    <li><a href="{{ route('customer.index') }}">My Account</a></li>
                                @elseif ($currentUser->role === \App\Models\User::ADMIN)
                                    <li><a href="{{ route('dashboard.index') }}">My Account</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>

                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Social Links</h4>
                        <ul>
                            @if (!empty($details['facebook']))
                                <li><a href="{{ $details['facebook'] }}">Facebook</a></li>
                            @endif
                            @if (!empty($details['whatsApp']))
                                <li><a href="{{ $details['whatsApp'] }}">WhatsApp</a></li>
                            @endif
                            @if (!empty($details['instagram']))
                                <li><a href="{{ $details['instagram'] }}">Instagram</a></li>
                            @endif
                            @if (!empty($details['youTube']))
                                <li><a href="{{ $details['youTube'] }}">Youtube</a></li>
                            @endif
                            @if (!empty($details['snapChat']))
                                <li><a href="{{ $details['snapChat'] }}">SnapChat</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <div class="footer-instagram">
                            <iframe src="https://www.instagram.com/p/POST_ID/embed" width="320" height="240"
                                frameborder="0" scrolling="no" allowtransparency="true">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>

            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <!--Footer Copyright-->
                    <div
                        class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left">
                        <span></span> <a href="{{ route('homePage') }}">{{ $details['footercopyright'] }}</a>
                    </div>
                    <!--End Footer Copyright-->
                    <!--Footer Payment Icon-->
                    <div
                        class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                        <ul class="payment-icons list--inline">
                            <li><i class="bi bi-credit-card-2-front"></i></li>
                            <li><i class="bi bi-credit-card"></i></li>
                            <li><i class="bi bi-paypal"></i></li>
                            <li><i class="bi bi-bank"></i></li>
                        </ul>
                    </div>
                    <!--End Footer Payment Icon-->
                </div>
            </div>
        </div>
    </div>
</footer>

<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>

<script>
    document.getElementById('subscribeForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json().then(data => ({
                status: response.status,
                body: data
            })))
            .then(obj => {
                const messageDiv = document.getElementById('subscribeMessage');
                if (obj.status === 200) {
                    messageDiv.innerHTML = `<p style="color:green;">${obj.body.message}</p>`;
                    this.reset();
                } else {
                    messageDiv.innerHTML = `<p style="color:red;">${obj.body.message}</p>`;
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

@include('Include.Script')
</div>
</body>


</html>
