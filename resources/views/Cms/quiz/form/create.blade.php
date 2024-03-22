<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

    <!-- select 2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/bootstrap5/bootstrap.min.css') }}">

    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/Css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/Css/responsive.css') }}">

</head>
<style>
    html,
    * {
        font-family: 'Inter';
        box-sizing: border-box;
    }

    body {
        margin: 0 auto;
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
    }

</style>

<body>

    @include('Cms.quiz.topMenu')

    <div class="container my-5 " style="max-width:900px;">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h1>Create Quiz</h1>
            <a href="">Go to Quiz</a>
        </div>
        
        <form action="{{ route('quizForm.store') }}" method="POST">
            @csrf
            <div class="form-group my-4">
                <label for="">Question <span class="text-danger">*</span></label> @error('question') <span
                    class="text-danger">{{ $message }}</span> @enderror
                <input type="text" class="form-control" value="{{ old('question') }}" name="question">
            </div>
            <div class="form-group my-4">
                <label for="">Question Type <span class="text-danger">*</span></label> @error('questionType') <span
                    class="text-danger">{{ $message }}</span> @enderror
                <select name="questionType" id="questionType" class="form-control">
                    <option value="">Select Question Type</option>
                    @foreach($questionTypes as $questionType)
                        <option value="{{ $questionType->id }}">{{ $questionType->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 my-4">
                    <label for="">Answer A <span class="text-danger">*</span></label> @error('answerA') <span
                        class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" value="{{ old('answerA') }}"
                        name="answerA">
                </div>
                <div class="form-group col-lg-6 my-4">
                    <label for="">Answer B <span class="text-danger">*</span></label> @error('answerB') <span
                        class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" value="{{ old('answerB') }}"
                        name="answerB">
                </div>
                <div class="form-group col-lg-6 my-4">
                    <label for="">Answer C <span class="text-danger">*</span></label> @error('answerC') <span
                        class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" value="{{ old('answerC') }}"
                        name="answerC">
                </div>
                <div class="form-group col-lg-6 my-4">
                    <label for="">Answer D <span class="text-danger">*</span></label> @error('answerD') <span
                        class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" value="{{ old('answerD') }}"
                        name="answerD">
                </div>
            </div>
            <div class="form-group my-4">
                <label for="">Correct Answer <span class="text-danger">*</span></label> @error('correctAnswer') <span
                    class="text-danger">{{ $message }}</span> @enderror
                <select name="correctAnswer" class="form-control" id="correctAnswer">
                    <option>Select Answer</option>
                    <option value="answerA">Answer A</option>
                    <option value="answerB">Answer B</option>
                    <option value="answerC">Answer C</option>
                    <option value="answerD">Answer D</option>
                </select>
            </div>
            <div class="form-group my-4">
                <label for="">Score</label>
                <input type="text" class="form-control" value="{{ old('score') }}" name="score">
            </div>
            <div class="form-group my-4">
                <label for="">Ordering</label>
                <input type="text" class="form-control" value="{{ old('ordering') }}" name="ordering">
            </div>
            <div class="form-group my-4 mt-5">
                <button type="submit" class="btn btn-primary w-100">Create</button>
            </div>
        </form>
    </div>

    <div class="container-sm" style="max-width:900px;">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Correct Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->question }}</td>
                    <td>{{ $quiz->answerA }}<br>{{ $quiz->answerB }}<br>{{ $quiz->answerC }}<br>{{ $quiz->answerD }} </td>
                    <td>{{ $quiz->correctAnswer }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('Cms.quiz.footerMenu')

    <script type="text/javascript" src="{{ asset('FrontEnd/bootstrap5/bootstrap.bundle.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example');
    </script>

    <script>
        $('#correctAnswer').select2({
            theme: 'bootstrap-5'
        });
        $('#questionType').select2({
            theme: 'bootstrap-5'
        });

    </script>


   
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
