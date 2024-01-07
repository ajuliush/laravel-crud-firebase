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
        <h4 class="text-center">Product</h4><br>
        <h5># Add Product</h5>
        <div class="card card-default">
            <div class="card-body">
                <form id="addProduct" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                            required autofocus>
                    </div>
                    <div class="invalid-feedback" id="nameError"></div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="description" class="sr-only">Email</label>
                        <input id="description" type="description" class="form-control" name="description" placeholder="Email"
                            required autofocus>
                    </div>
                    <div class="invalid-feedback" id="descriptionError"></div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="qyt" class="sr-only">Quantity</label>
                        <input id="qyt" type="number" class="form-control" name="qyt" placeholder="Quantity"
                            required autofocus>
                    </div>
                    <div class="invalid-feedback" id="qytError"></div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="image" class="sr-only">Image</label>
                        <input id="image" type="file" class="form-control" name="image" placeholder="Image"
                            required autofocus>
                    </div>
                    <div class="invalid-feedback" id="qytError"></div>
                    <button id="submitUser" type="button" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
        <br>
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
        <h5># Users</h5>
        <table class="table table-bordered">
            <tr>
                {{-- <th>SL</th> --}}
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="180" class="text-center">Action</th>
            </tr>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>

    <!-- SHow Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="show-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1"
            role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Show</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="showBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Update Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1"
            role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-success updateUser">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1"
            role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                            aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                            data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Initialize Firebase
        var config = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}",
            measurementId: "{{ config('services.firebase.measurement_id') }}"
        };
        firebase.initializeApp(config);
        firebase.analytics();

        var database = firebase.database();

        var lastIndex = 0;
        var sl = 1;

        // Get Data
        firebase.database().ref('Users/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function(index, value) {
                if (value) {
                    var phone = value.phone || '';

                    htmls.push('<tr>\
                             <td>' + value.name + '</td>\
                            <td>' + value.email + '</td>\
                             <td>' + phone +
                        '</td>\
                            <td><button data-toggle="modal" data-target="#show-modal" class="btn btn-info showData" data-id="' +
                        index +
                        '">Show</button>\
                            <button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' +
                        index +
                        '">Update</button>\
                             <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' +
                        index + '">Delete</button></td>\
                                                </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitUser").removeClass('desabled');
        });

        // Add Data
        $('#submitUser').on('click', function() {
            // Clear previous error messages
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
            $('#successMessage').hide();  // Hide success message
            // Validate form fields
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var isValid = true;

            if (name.trim() === '') {
                $('#name').addClass('is-invalid');
                isValid = false;
            }
            if (email.trim() === '') {
                $('#email').addClass('is-invalid');
                isValid = false;
            }
            if (phone.trim() === '') {
                $('#phone').addClass('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                // If any field is not valid, display a general error message
                $('#errorMessages').text('Please fix the errors in the form.');
                return;
            }
            // Rest of your existing code for submitting to Firebase
            var values = $("#addProduct").serializeArray();
            var userID = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Users/' + userID).set({
                name: name,
                email: email,
                phone: phone,
            });

            // Show success message
            $('#successMessage').fadeIn(500).delay(2000).fadeOut(500);

            // Reassign lastID value
            lastIndex = userID;
            $("#addProduct input").val("");
        });
        // Keypress event handler for changing input field color
        $('.form-control').on('input', function() {
            if ($(this).val().trim() !== '') {
                $(this).removeClass('is-invalid');
                $(this).addClass('input-valid');
            } else {
                $(this).removeClass('input-valid');
            }
        });
        // Show Data
        var showID = 0;
        $('body').on('click', '.showData', function() {
            showID = $(this).attr('data-id');
            firebase.database().ref('Users/' + showID).on('value', function(snapshot) {
                var values = snapshot.val();
                var showData =
                    '<table class="table">\
            <tr>\
                <td>\
                    <label class="col-form-label">Name:</label>\
                    <span id="firstNameValue">' + values.name + '</span>\
                </td>\
            </tr>\
            <tr>\
                <td>\
                    <label class="col-form-label">Email:</label>\
                    <span id="emailValue">' + values.email + '</span>\
                </td>\
            </tr>\
            <tr>\
                <td>\
                    <label class="col-form-label">Phone:</label>\
                    <span id="phoneValue">' + values.phone + '</span>\
                </td>\
            </tr>\
        </table>';


                $('#showBody').html(showData);
            });
        });
        // Update Data
        var updateID = 0;
        $('body').on('click', '.updateData', function() {
            updateID = $(this).attr('data-id');
            firebase.database().ref('Users/' + updateID).on('value', function(snapshot) {
                var values = snapshot.val();
                var updateData =
                    '<div class="form-group">\
                                                    <label for="first_name" class="col-md-12 col-form-label">Name</label>\
                                                    <div class="col-md-12">\
                                                        <input id="update-name" type="text" class="form-control" name="name" value="' +
                    values
                    .name +
                    '" required autofocus>\
                                                    </div>\
                                                </div>\
                                                <div class="form-group">\
                                                    <label for="last_name" class="col-md-12 col-form-label">Email</label>\
                                                    <div class="col-md-12">\
                                                        <input id="update-email" type="text" class="form-control" name="email" value="' +
                    values
                    .email +
                    '" required autofocus>\
                                                    </div>\
                                                </div>\
                                                <div class="form-group">\
                                                    <label for="last_name" class="col-md-12 col-form-label">Phone</label>\
                                                    <div class="col-md-12">\
                                                        <input id="update-phone" type="number" class="form-control" name="phone" value="' +
                    values
                    .phone + '" required autofocus>\
                                                    </div>\
                                                </div>';

                $('#updateBody').html(updateData);
            });
        });

        $('.updateUser').on('click', function(event) {
            event.preventDefault(); // Prevent form submission

            // Clear previous error messages
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
            $('#updatesMessage').hide();  // Hide update message
            // Validate form fields
            var values = $(".users-update-record-model").serializeArray();
            var name = values[0].value;
            var email = values[1].value;
            var phone = values[2].value;
            var isValid = true;

            if (name.trim() === '') {
                $('#update-name').addClass('is-invalid');
                isValid = false;
            }

            if (email.trim() === '') {
                $('#update-email').addClass('is-invalid');
                isValid = false;
            }

            if (phone.trim() === '') {
                $('#update-phone').addClass('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                // If any field is not valid, display a general error message
                $('#update-errorMessages').text('Please fix the errors in the form.');
                return;
            }

            var postData = {
                name: name,
                email: email,
                phone: phone,
            };

            var updates = {};
            updates['/Users/' + updateID] = postData;

            firebase.database().ref().update(updates);

            $("#update-modal").modal('hide');
            // Show update message
            $('#updateMessage').fadeIn(500).delay(2000).fadeOut(500);

        });

        // Remove Data
        $("body").on('click', '.removeData', function() {
            var id = $(this).attr('data-id');
            $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id +
                '">');
        });

        $('.deleteRecord').on('click', function() {
            var values = $(".users-remove-record-model").serializeArray();
            var id = values[0].value;
            $('#deleteMessage').hide();  // Hide update message
            $('#safeMessage').hide();  // Hide safe message
            firebase.database().ref('Users/' + id).remove();
            $('body').find('.users-remove-record-model').find("input").remove();
            $("#remove-modal").modal('hide');
             // Show delete message
             $('#deleteMessage').fadeIn(500).delay(2000).fadeOut(500);
        });
        $('.remove-data-from-delete-form').click(function() {
            $('body').find('.users-remove-record-model').find("input").remove();
            $('#safeMessage').fadeIn(500).delay(2000).fadeOut(500);
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
