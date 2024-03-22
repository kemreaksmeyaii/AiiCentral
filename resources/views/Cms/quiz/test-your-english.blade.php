
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test your English</title>
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
<div id="backToTopBtn"><i class="fa-solid fa-chevron-up"></i></div>

@include('Cms.top-menu')

<style>
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        max-width:850px;
        min-width:400px;
        /* width: 80%; Could be more or less, depending on screen size */
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- <div id="emailModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <p>Subscribe to our newsletter:</p>
        <input type="email" class="form-control mb-3" id="emailInput" placeholder="Enter your email">
        <button id="subscribeBtn" class="btn btn-primary">Subscribe</button>
    </div>
</div> -->


<style>
    .testContainer{
        max-width: 900px;
        margin: 0 auto;
        padding:30px;
    }
    
    legend {
        display: block;
        color: #c1c1c1;
        text-align: center;
        padding-bottom: 10px;
        padding-top: 3px;
        font-size: 20px;

    }

    a.next,
    a.back {
        margin-top: 20px;
        color: #9b9b9b;
        cursor: pointer;
        text-decoration:none;
    }

    a.next {
        float: right;
    }

    a.back {
        float: left;
    }

    .form-check {
        border: 1px solid #eee;
        padding: 10px;
        margin: 12px 0;
        padding-left: 35px;
        background-color: #fafafa;
        border-radius: 8px;
        cursor:pointer;
    }
    .form-check:hover{
        outline:1px solid #145E8A;
    }


    .next,
    .back {
        padding: 8px 25px !important;
        background-color: #145E8A !important;
        border-radius: 8px !important;
        border: 1px solid #145E8A !important;
        color:#fff !important;
    }

    .next:hover,
    .back:hover {
        background-color: #145E8A !important;
        color:#fff !important;
    }


    .progress-container {
        width: 100%;
        background-color: #f1f1f1;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .progress-bar {
        height: 10px;
        width: 0;
        background-color: #145E8A;
        border-radius: 5px;
        transition: width 0.5s ease-in-out;
    }
</style>
<div class="testContainer">
<h3>Test Your Eenglish</h3>
        <form id="quizForm" action="{{ route('quiz.submit') }}" method="Post">
            @csrf
            <span class="form-title">For the questions below, please choose the best option to complete the sentence or
                conversation.</span>

            @php
                $quizzesChunks = $data['quizzes']->chunk(5);
                $totalChunks = count($quizzesChunks);
            @endphp

            @foreach($quizzesChunks as  $index => $chunk)
                <fieldset>
                    <legend class="mt-3">Page {{ $index + 1 }} of {{ $totalChunks }} </legend>
                    <div class="progress-container my-4 mb-5">
                        <div class="progress-bar" style="width: {{ ($index + 1) * 25 }}%;"></div>
                    </div>
                    
                    @foreach($chunk->groupBy('questionTypes.description') as $description => $typeQuizzes)
                    <p>{{ $description }}</p>
                        @foreach($typeQuizzes as $quiz)
                            <div class="my-4 mb-5">
                                <h5>{{ $quiz->question }}</h5>
                                <div class="mt-3">
                                    <div class="form-check" onclick="document.getElementById('question{{ $quiz->ordering }}answerA').click()">
                                        <input class="form-check-input" type="radio" value="answerA"
                                            name="question{{ $quiz->ordering }}" id="question{{ $quiz->ordering }}answerA"
                                            {{ old('question' . $quiz->ordering) == 'answerA' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="question{{ $quiz->ordering }}answerA">
                                            {{ $quiz->answerA }}
                                        </label>
                                    </div>
                                    <div class="form-check" onclick="document.getElementById('question{{ $quiz->ordering }}answerB').click()">
                                        <input class="form-check-input" type="radio" value="answerB"
                                            name="question{{ $quiz->ordering }}" id="question{{ $quiz->ordering }}answerB"
                                            {{ old('question' . $quiz->ordering) == 'answerB' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="question{{ $quiz->ordering }}answerB">
                                            {{ $quiz->answerB }}
                                        </label>
                                    </div>
                                    <div class="form-check" onclick="document.getElementById('question{{ $quiz->ordering }}answerC').click()">
                                        <input class="form-check-input" type="radio" value="answerC"
                                            name="question{{ $quiz->ordering }}" id="question{{ $quiz->ordering }}answerC"
                                            {{ old('question' . $quiz->ordering) == 'answerC' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="question{{ $quiz->ordering }}answerC">
                                            {{ $quiz->answerC }}
                                        </label>
                                    </div>
                                    <div class="form-check" onclick="document.getElementById('question{{ $quiz->ordering }}answerD').click()">
                                        <input class="form-check-input" type="radio" value="answerD"
                                            name="question{{ $quiz->ordering }}" id="question{{ $quiz->ordering }}answerD"
                                            {{ old('question' . $quiz->ordering) == 'answerD' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="question{{ $quiz->ordering }}answerD">
                                            {{ $quiz->answerD }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    @if($index + 1 === $totalChunks)
                        <div class="mt-4">
                            <button type="submit" name="submit" style="background-color:#145E8A;border:1px solid #145E8A;" class="btn btn-primary w-100">GET RESULT</button>
                        </div>
                    @endif
                

                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    

                </fieldset>
            @endforeach
            
            <div id="errorContainer" class="alert alert-danger pt-4 mt-3" style="display: none;">
                <ul id="errorList"></ul>
            </div>

        </form>
    </div>


    
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<script>
    $(document).ready(function () {
        $("#quizForm").validate({
            rules: {
                @foreach($data['quizzes'] as $quiz)
                    'question{{ $quiz->ordering }}': 'required',
                @endforeach
            },
            messages: {
                @foreach($data['quizzes'] as $quiz)
                    'question{{ $quiz->ordering }}': 'Please answer question {{ $quiz->ordering }}',
                @endforeach
            },
            errorContainer: "#errorContainer",
            errorLabelContainer: "#errorList",
            wrapper: "li"
        });
    });
</script>

<script>
    $.fn.wizard = function(options) {

var defaults = { 
    backButton: 'Back',
    nextButton: 'Next',
    willSwitch: function() { return true; },
}; 

  var settings = $.extend({}, defaults, options); 

var fields = $(this).find('fieldset');
var submit = $(this).find('input[type=submit]');

   $(submit).hide();
   fields.slice(1).hide();
   
$.each(fields,function(index,el) {

    $(el).data("index", index);

       if (index < fields.length-1) {
        $(el).append("<a class='next'>"+settings.nextButton+"</a>");
    }
    
    if (index > 0) {
        $(el).append("<a class='back'>"+settings.backButton+"</a>");
    }

});

$('.next').click(function() {

             var current = $(this).closest('fieldset');
             var next = current.next('fieldset');
             
             if (!settings.willSwitch(current,next)) {
                 return;
             }

            if ($("#quizForm").valid()) {
                current.hide();
                next.fadeIn(500);

                // Animate the scroll position to the top of the window
                $('html, body').animate({ scrollTop: 0 }, 'fast');
                // FadeIn effect
                $('body').hide().fadeIn('fast');

                if (next.is(':last-of-type')) {
                    submit.show();
                }
            }
            
         });
         
   $('.back').click(function() {
               var current = $(this).closest('fieldset');
               var previous = current.prev('fieldset');
               
               if (!settings.willSwitch(current,previous)) {
                   return;
               }
               current.hide();
               previous.fadeIn(500); 

            // Animate the scroll position to the top of the window
            $('html, body').animate({ scrollTop: 0 }, 'fast');
            // FadeIn effect
            $('body').hide().fadeIn('fast');
   
               submit.hide();		
           });
   
return this;
}

</script>

<script type="text/javascript">
    $('form').wizard();
</script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    @include('Cms.bottom-menu')
    
    
    <script type="text/javascript" src="{{ asset('FrontEnd/bootstrap5/bootstrap.bundle.min.js') }}"></script>

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


    <!-- JavaScript to Show Modal Automatically -->
    <script>
        // Get the modal
        var modal = document.getElementById('emailModal');

        // Get the <span> element that closes the modal
        var span = document.getElementById('closeModal');

        // When the page loads, show the modal
        window.onload = function() {
            modal.style.display = 'block';
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = 'none';
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>
    <script>
        // JavaScript to handle subscription
        document.getElementById('subscribeBtn').addEventListener('click', function() {
            var email = document.getElementById('emailInput').value;

            // Send email to Laravel backend
            fetch('/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => {
                if (response.ok) {
                    // Handle success (e.g., display thank you message)
                    console.log('Subscription successful');
                } else {
                    // Handle error (e.g., display error message)
                    console.error('Subscription failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</body>
</html>




