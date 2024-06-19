let form = '#userForm';

$(document).ready(function () {
    $('#userForm').validate({
        rules: {
            userName: {
                required: true,
            },
            email: {
                required: true,
                email:true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            role: {
                required: true,
            }
        },
        messages: {
            userName: 'Please enter Name.',
            email: {
              required: 'Please enter Email Address.',
              email: 'Please enter a valid Email Address.',
            },
            password: {
              required: 'Please enter Password.',
            },
            confirm_password: {
              required: 'Please enter Confirm Password.',
              equalTo: 'Confirm Password do not match with Password.',
            },
            role: {
                required: "Please Select Role....."
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
})

