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
firebase.database().ref('Users/').on('value', function (snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function (index, value) {
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
$('#submitUser').on('click', function () {
    // Clear previous error messages
    $('.invalid-feedback').text('');
    $('.form-control').removeClass('is-invalid');
    $('#successMessage').hide(); // Hide success message
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
$('.form-control').on('input', function () {
    if ($(this).val().trim() !== '') {
        $(this).removeClass('is-invalid');
        $(this).addClass('input-valid');
    } else {
        $(this).removeClass('input-valid');
    }
});
// Show Data
var showID = 0;
$('body').on('click', '.showData', function () {
    showID = $(this).attr('data-id');
    firebase.database().ref('Users/' + showID).on('value', function (snapshot) {
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
$('body').on('click', '.updateData', function () {
    updateID = $(this).attr('data-id');
    firebase.database().ref('Users/' + updateID).on('value', function (snapshot) {
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

$('.updateUser').on('click', function (event) {
    event.preventDefault(); // Prevent form submission

    // Clear previous error messages
    $('.invalid-feedback').text('');
    $('.form-control').removeClass('is-invalid');
    $('#updatesMessage').hide(); // Hide update message
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
$("body").on('click', '.removeData', function () {
    var id = $(this).attr('data-id');
    $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id +
        '">');
});

$('.deleteRecord').on('click', function () {
    var values = $(".users-remove-record-model").serializeArray();
    var id = values[0].value;
    $('#deleteMessage').hide(); // Hide update message
    $('#safeMessage').hide(); // Hide safe message
    firebase.database().ref('Users/' + id).remove();
    $('body').find('.users-remove-record-model').find("input").remove();
    $("#remove-modal").modal('hide');
    // Show delete message
    $('#deleteMessage').fadeIn(500).delay(2000).fadeOut(500);
});
$('.remove-data-from-delete-form').click(function () {
    $('body').find('.users-remove-record-model').find("input").remove();
    $('#safeMessage').fadeIn(500).delay(2000).fadeOut(500);
});
