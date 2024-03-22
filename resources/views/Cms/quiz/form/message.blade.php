

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/bootstrap5/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="p-5">
            <h2>New Contact Form Submission</h2>
            <p>User ID:</p>
            <p>{{ $userId }}</p>
            <hr>
            <p>Platform:</p>
            <p>{{ $platform }} {{ $platformVersion }}</p>
            <hr>
            <p>Browser:</p>
            <p>{{ $browser }} {{ $browserVersion }}</p>
            <hr>
            <p>Total Score: </p>
            <p>{{ $totalScore }}</p>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('FrontEnd/bootstrap5/bootstrap.bundle.min.js') }}"></script>

</body>
</html>