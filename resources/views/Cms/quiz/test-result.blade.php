<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Your Englis | your Result</title>
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
   

<style>
    .navbar-nav .nav-item .nav-link {
        color: #FFF;
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #1b5f8b;
    }

    .navbar-nav .nav-link {
        color: #FFF !important;
        font-weight: 400;
        font-size: 16px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:active {
        color: rgba(255, 255, 255, 0.5) !important;
        font-weight: 400;
        font-size: 16px;
    }


    .mobile-navbar .nav-item .dropdown-item{
        padding: 0.8rem;
    }

    .mobile-navbar .dropdown-menu {
        background-color:transparent;
        border:0 !important;
        padding-top: 0;
        padding-bottom: 0;
        margin-top: 0;
        margin-bottom: 0;
    }
    .mobile-navbar .dropdown-menu .dropdown .dropdown-item{
        padding: 0.8rem !important;
    }

    .mobile-navbar .dropdown-menu .dropdown .dropdown-menu .dropdown .dropdown-item{
        padding: 0.8rem !important;
    }

</style>
     
    @include('Cms.quiz.topMenu')

    <style>
        .testContainer{
            margin: 0 auto;
            padding:30px;
            max-width:900px;
        }
    </style>

    <div class="testContainer container">
        <p>Congratulations on completing the online English language test! Your score provides valuable insights into
            your current English proficiency level and serves as a starting point for your language learning journey.
            Here's a personalized interpretation of your score and when you are ready, you can visit us at Aii Language
            Center to know more about us or enroll now.</p>

        @php
            $totalScore = request()->query('totalScore');
        @endphp

        <p style="font-size:1.5rem;font-weight:600;">Your Score is {{ $totalScore }} out of 20 </p>

        @if($totalScore <= 4)
            <p>{{ "Your score suggests that you are at the initial stages of learning English. You may have a limited understanding of basic vocabulary and grammar." }}
            </p>
            <p>{{ "Don't be discouraged! Starting from scratch is an exciting opportunity to build a strong foundation. By immersing yourself in English learning materials and courses, you'll gradually improve and gain confidence in your language skills. Remember, every small step forward counts!" }}
            </p>
        @elseif($totalScore >= 5 && $totalScore <= 8)
            <p>{{ "Your score indicates a basic understanding of English vocabulary and grammar, but there is room for improvement." }}
            </p>
            <p>{{ "Well done on reaching the elementary level! You're already on your way to effective communication in English. Keep practicing your language skills through conversations, listening exercises, and reading materials. With consistent effort, you'll continue to progress and express your thoughts more confidently." }}
            </p>
        @elseif($totalScore >= 9 && $totalScore <= 12)
            <p>{{ "Your score demonstrates a moderate level of English proficiency. You can understand and participate in basic conversations, but may face challenges with complex language structures and vocabulary." }}
            </p>
            <p>{{ "Great job on reaching the intermediate level! You've come a long way in your English learning journey. Focus on expanding your vocabulary, improving grammar accuracy, and engaging in more immersive language activities. By embracing new challenges and continuously practicing, you'll enhance your fluency and express yourself with greater ease." }}
            </p>
        @elseif($totalScore >= 13 && $totalScore <= 16)
            <p>{{ "Your score suggests a solid command of English, enabling you to handle a wide range of communicative tasks. However, there may still be areas for improvement." }}
            </p>
            <p>{{ "Fantastic achievement at the upper intermediate level! You're already a proficient English speaker. To further refine your language skills, expose yourself to authentic English materials, engage in more complex conversations, and practice advanced writing. Your dedication and effort will propel you towards even greater fluency and accuracy." }}
            </p>
        @elseif($totalScore >= 17 && $totalScore <= 20)
            <p>{{ "Your score indicates an advanced level of English proficiency. You can comprehend and communicate effectively in complex academic and professional contexts." }}
            </p>
            <p>{{ "Remarkable accomplishment at the advanced level! You're on the path to near-native fluency. Focus on fine-tuning your language skills, such as mastering idiomatic expressions, refining pronunciation, and polishing your writing style. With perseverance, you'll continue to excel and unlock limitless opportunities in both personal and professional domains." }}
            </p>
        @endif

        <p>Click here to register and one of our staff will email or call you!</p>
        <div class="d-flex">
            <div style="margin-left:0;margin-right:20px;">
                <a target="_blank" href="https://registration.aii.edu.kh/login"
                    style="background-color:#145E8A;color:#fff;border:1px solid #145E8A;padding:7px 20px;"
                    class="btn btn-primary">Register</a>
                    
            </div>
            <div>
                <a href="{{ App::getLocale() == 'kh' ? '/test-your-english' : '/test-your-english' }}" style="padding:7px 20px;" class="btn btn-secondary">Try again</a>
            </div>
        </div>

    </div>



    @include('Cms.quiz.footerMenu')


 
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




    </body>
</html>