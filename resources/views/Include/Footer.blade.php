@php
    $details = getThemeOptions('footer');
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
                            @if (isset($details['facebook']))
                                <li>
                                    <a class="social-icons__link" href="{{ $details['facebook'] }}" target="_blank"
                                        title=""><i class="icon icon-facebook"></i><span
                                            class="icon__fallback-text">Facebook</span></a>
                                </li>
                            @endif
                            @if (isset($details['whatsApp']))
                                <li><a class="social-icons__link" href="{{ $details['whatsApp'] }}" target="_blank"
                                        title=""><i class="icon icon-twitter"></i> <span
                                            class="icon__fallback-text">Whats App Link</span></a></li>
                            @endif
                            @if (isset($details['instagram']))
                                <li><a class="social-icons__link" href="{{ $details['instagram'] }}" target="_blank"
                                        title=""><i class="icon icon-instagram"></i> <span
                                            class="icon__fallback-text">Instagram</span></a></li>
                            @endif
                            @if (isset($details['youtube']))
                                <li><a class="social-icons__link" href="{{ $details['youtube'] }}" target="_blank"
                                        title=""><i class="icon icon-youtube"></i> <span
                                            class="icon__fallback-text">YouTube</span></a></li>
                            @endif
                            @if (isset($details['snapChat']))
                                <li><a class="social-icons__link" href="{{ $details['snapChat'] }}" target="_blank"
                                        title=""><i class="icon icon-snapchat"></i> <span
                                            class="icon__fallback-text">snapChat</span></a></li>
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
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Quick Shop</h4>
                        <ul>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Sportswear</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Informations</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms &amp; condition</a></li>
                            <li><a href="#">My Account</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Customer Services</h4>
                        <ul>
                            <li><a href="#">Request Personal Data</a></li>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Support Center</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i>
                                <p>{{ $details['address'] ?? '' }}</p>
                            </li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i>
                                <p>{{ $details['number'] ?? '' }}</p>
                            </li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i>
                                <p>{{ $details['email'] ?? '' }}</p>
                            </li>
                        </ul>
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
                            <li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
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
