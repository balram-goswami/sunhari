@include('Include.Style')
<style>
    * {
        padding: 0;
        margin: 0;
        color: #1a1f36;
        box-sizing: border-box;
        word-wrap: break-word;
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
    }



    h1 {
        letter-spacing: -1px;
    }

    a {
        color: #DD3631;
        text-decoration: unset;
    }

    .flex-flex {
        display: flex;
    }



    .box-root {
        box-sizing: border-box;
    }

    .flex-direction--column {
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .loginbackground-gridContainer {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: [start] 1fr [left-gutter] (86.6px)[16] [left-gutter] 1fr [end];
        grid-template-columns: [start] 1fr [left-gutter] repeat(16, 86.6px) [left-gutter] 1fr [end];
        -ms-grid-rows: [top] 1fr [top-gutter] (64px)[8] [bottom-gutter] 1fr [bottom];
        grid-template-rows: [top] 1fr [top-gutter] repeat(8, 64px) [bottom-gutter] 1fr [bottom];
        justify-content: center;
        margin: 0 -2%;
        transform: rotate(-12deg) skew(-12deg);
    }

    .box-divider--light-all-2 {
        box-shadow: inset 0 0 0 2px #e3e8ee;
    }

    .box-background--blue {
        background-color: #DD3631;
    }

    .box-background--white {
        background-color: #ffffff;
    }

    .box-background--blue800 {
        background-color: #DD3631;
    }

    .box-background--gray100 {
        background-color: #e3e8ee;
    }

    .box-background--cyan200 {
        background-color: #7fd3ed;
    }

    .padding-top--64 {
        padding-top: 64px;
    }

    .padding-top--24 {
        padding-top: 24px;
    }

    .padding-top--48 {
        padding-top: 48px;
    }

    .padding-bottom--24 {
        padding-bottom: 24px;
    }

    .padding-horizontal--48 {
        padding: 48px;
    }

    .padding-bottom--15 {
        padding-bottom: 15px;
    }


    .flex-justifyContent--center {
        -ms-flex-pack: center;
        justify-content: center;
    }

    .formbg {
        margin: 0px auto;
        width: 100%;
        max-width: 448px;
        background: white;
        border-radius: 4px;
        box-shadow: #2d2d2d 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
    }

    span {
        display: block;
        font-size: 20px;
        line-height: 28px;
        color: #1a1f36;
    }

    label {
        margin-bottom: 10px;
    }

    .reset-pass a,
    label {
        font-size: 14px;
        font-weight: 600;
        display: block;
    }

    .reset-pass>a {
        text-align: right;
        margin-bottom: 10px;
    }

    .grid--50-50 {
        display: grid;
        grid-template-columns: 50% 50%;
        align-items: center;
    }

    .field input {
        font-size: 16px;
        line-height: 28px;
        padding: 8px 16px;
        width: 100%;
        min-height: 44px;
        border: unset;
        border-radius: 4px;
        outline-color: rgb(84 105 212 / 0.5);
        background-color: rgb(255, 255, 255);
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    }

    input[type="submit"] {
        background-color: rgb(84, 105, 212);
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0.12) 0px 1px 1px 0px,
            rgb(84, 105, 212) 0px 0px 0px 1px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .field-checkbox input {
        width: 20px;
        height: 15px;
        margin-right: 5px;
        box-shadow: unset;
        min-height: unset;
    }

    .field-checkbox label {
        display: flex;
        align-items: center;
        margin: 0;
    }


    .ast_banner_text {
        float: left;
        width: 100%;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        padding: 100px 0px;
    }
</style>

</head>

<body>

    <div class="row">
        <div class="ast_slider_wrapper"
            style="background-image: url('{{ asset('assets/img/backgrounds/1920x950.jpg') }}');">

            <div class="ast_banner_text">
                <div class="starfield">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="ast_waves">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="ast_waves2">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="ast_waves3">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="box-root padding-top--24 flex-flex flex-direction--column"
                    style="flex-grow: 1; z-index: 9;">
                    <div class="formbg-outer">
                        <div class="formbg">
                            <div class="formbg-inner padding-horizontal--48">
                                <span class="padding-bottom--15">Sign in to your account</span>
                                <form action="{{ route('login.store') }}" method="POST" class="login mb-3"
                                    id="formAuthentication">
                                    @csrf
                                    <div class="field padding-bottom--24">
                                        <input type="email" id="email" name="email" placeholder="Your Email"
                                            required>
                                    </div>
                                    <div class="field padding-bottom--24">

                                        <input type="password" id="password" name="password" placeholder="Password"
                                            required>
                                    </div>
                                    <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                        <div class="grid--50-50">
                                            <label for="stay_signed_in">
                                                <input type="checkbox" id="stay_signed_in" name="stay_signed_in"> Stay
                                                Signed In
                                            </label>
                                            <div class="reset-pass">
                                                <a href="{{ route('forgot-password.index') }}">Forgot your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field padding-bottom--24">
                                        <input type="submit" name="submit" value="Sign In">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Include.Script')
