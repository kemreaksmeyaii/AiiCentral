<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:locale" content="en_US" />
    <meta property="og:locale:alternate" content="kh_KH" />
    <meta property="og:site_name" content="Aii Language Centers" />
    <meta property="keywords" content="Aii language center, Aii,international school, Aii school, education, MJQE, mjqeducation" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="360" />
    
    <meta property="og:url"   content="{{ url()->current() }} " />
    <meta property="og:type"  content="website"/>
    <!-- twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Aii Language Center">
    <meta name="twitter:creator" content="Aii Language Center">

    <link rel="shortcut icon" href="{{ asset('FrontEnd/Image/favicon.png') }}">
    <title>@yield('title','Aii Language Center')</title>

    @yield('metatag')



        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-PBDG0KBHX3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-PBDG0KBHX3');
        </script>


    <!-- microsoft clarify -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "hust00vex6");
    </script>


    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "136174883083148");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugin/cookiebanner/cookiebanner.style.css') }}">
    <script src="{{ asset('plugin/cookiebanner/cookiebanner.script.js') }}"></script>
    <script>
        $(document).ready(function() {
            cookieBanner.init();
        });
    </script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/bootstrap5/bootstrap.min.css') }}">
    <!-- sweet alert 2 -->
    <!-- <link rel="stylesheet" href="{{ asset('FrontEnd/Js/sweetalert2/sweetalert2.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/Css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/Css/responsive.css') }}">

    @yield('style')

</head>

<body>


    <!-- Your SDK code -->
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "136174883083148");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>


    <div id="backToTopBtn"><i class="fa-solid fa-chevron-up"></i></div>

    @include('Cms.top-menu')
    @yield('content')

    @include('Cms.bottom-menu')
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('FrontEnd/bootstrap5/bootstrap.bundle.min.js') }}"></script>

    <!-- owl carousel   -->
    <link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <!-- owl carousel  -->
    <script src="{{ asset('plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugin/owlcarousel/js/script.js') }}"></script>

    <script src="{{ asset('FrontEnd/Js/script.js') }}"></script>


    <script>
        //back to top
        var backToTop = $("#backToTopBtn");

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                backToTop.addClass("show");
            } else {
                backToTop.removeClass("show");
            }
        });

        backToTop.click(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            return false;
        });

    </script>

    @yield('script')
</body>

</html>
