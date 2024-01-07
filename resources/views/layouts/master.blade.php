<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>
    <style>
        .input-valid {
            border-color: green !important;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <!-- Add a div for success message -->
        <div id="successMessage" class="alert alert-success" style="display: none;">
            Data inserted successfully!
        </div>
        <!-- Add a div for update message -->
        <div id="updateMessage" class="alert alert-info" style="display: none;">
            Data updated successfully!
        </div>
        <!-- Add a div for delete message -->
        <div id="deleteMessage" class="alert alert-danger" style="display: none;">
            Data deteted successfully!
        </div>
        <!-- Add a div for safe message -->
        <div id="safeMessage" class="alert alert-info" style="display: none;">
            Data safe successfully!
        </div>
        <br>
        @yield('content')
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
