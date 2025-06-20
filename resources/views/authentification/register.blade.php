<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Register</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="Assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/animation.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

    <!-- Font -->
    <link rel="stylesheet" href="Assets/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="Assets/icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="Assets/images/logo/rideeasy.png">
    <link rel="apple-touch-icon-precomposed" href="Assets/images/favicon.png">

</head>

<body class="body">
    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page sign-up">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="" id="site-logo-inner"></a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="login-box">
                        <div class="text-center mb-20">
                            <img src="Assets/images/logo/rideeasy.png" alt="Company Logo" class="company-logo"
                                style="max-width: 300px;">
                        </div>
                        <div>
                            <h3>Create your account</h3>
                            <div class="body-text">Enter your personal details to create account</div>
                        </div>
                        <form class="form-login flex flex-column gap24" method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset class="name">
                                <div class="body-title mb-10">Your username <span class="tf-color-1">*</span></div>
                                <div class="flex gap10">
                                    <input class="flex-grow" type="text" placeholder="First name" name="name"
                                        tabindex="0" value="" aria-required="true" required="">
                                    <!-- <input class="flex-grow" type="text" placeholder="Last name" name="last_name"
                                        tabindex="0" value="" aria-required="true" required=""> -->
                                </div>
                            </fieldset>
                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" placeholder="Enter your email address"
                                    name="email" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="email">
                                <div class="body-title mb-10">Mobile <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Enter your mobile number" name="phone"
                                    tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Enter your password"
                                    name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Confirm password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Enter your password"
                                    name="confirm_password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed" name="agree_policy">
                                    <label class="body-text" for="signed">Agree with Privacy Policy</label>
                                </div>
                            </div>
                            <button type="submit" class="tf-button w-full">Sign Up</button>
                        </form>


                        <div class="body-text text-center">
                            You have an account?
                            <a href="{{ route('login') }}" class="body-text tf-color">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="text-tiny">Copyright © 2024 Remos, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/bootstrap-select.min.js"></script>
    <script src="Assets/js/main.js"></script>

</body>

</html>