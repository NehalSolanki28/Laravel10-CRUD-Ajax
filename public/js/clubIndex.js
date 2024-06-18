$(function() {
    responseData();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function responseData() {
        $('.active').removeClass('active')
        $('#clubBtn').addClass('active')

        $('#parent').html('<center><div div class= "loader"></div ></center> ');
        
        setTimeout(function () {
            $.ajax({
                url: '/clubs',
                type: 'GET',
                cache:false,
                success: function (response) {
                    $('#parent').html(response);
                }
            });
        }, 1000)
    };

    $('#clubBtn').on('click',function() {
        responseData();
    });


    // Edit Data
    $(document).on('click', '.edit-btn', function (e) {

        $('#clubForm').validate().resetForm();
        e.preventDefault();
        let itemId = $(this).data('id');
        // console.log(itemId);
        $.ajax({
            url: "/clubs/" + itemId + '/edit',
            type: 'GET',
            success: function (response) {
                $('#itemId').val(response.club.id);
                $('#group_id').val(response.club.group_id);
                $('#business_name').val(response.club.business_name);
                $('#club_number').val(response.club.club_number);
                $('#club_name').val(response.club.club_name);
                $('#club_state').val(response.club.club_state);
                $('#club_description').val(response.club.club_description);
                $('#club_slug').val(response.club.club_slug);
                $('#website_title').val(response.club.website_title);
                $('#website_link').val(response.club.website_link);

                $('#exampleModalLabel').text('Edit Club');
                $('#submit').text('Update');
                $('#createModal').modal('show');
                $('#_method').val(itemId ? 'PUT' : 'POST')
            }
        })
    })

    // Save Data & Update Data

    $('#clubForm').on('submit', function (e) {
        e.preventDefault();
        let itemId = $('#itemId').val();
        let url = itemId ? '/clubs/' + itemId : '/clubs';
        let clubFormData = new FormData(this);
        if (!$(this).valid()) {
            return false;
        };
        $.ajax({
            url: url,
            type: 'POST',
            data: clubFormData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response) {
                    Swal.fire({
                        title: "Good Job!",
                        text: response.message,
                        type: "success",
                    });
                    responseData();
                }
                $('#clubForm').trigger('reset');
                $('#createModal').modal('hide');
                $('#_method').val(itemId ? 'PUT' : 'POST')
            },
            error: function (error) {
                $('#_method').val(itemId ? 'PUT' : 'POST')
            }
        });
    });

    // Delete Data
    $(document).on('click', '.delete-btn', function (e) {
        console.log(e);
        let itemId = $(this).data('id');
        function deleteConfirmation(id) {
            Swal.fire({
                title: "Delete?",
                type: 'question',
                text: "Are You Sure You Want To Delete ..... !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Delete it ..... !",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true,
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        url: '/clubs/' + itemId,
                        type: 'delete',
                        success: function (response) {
                            Swal.fire("Done!", "It was Successfully deleted!", "success");
                            responseData();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    })
                } else {
                    e.dismiss;
                }

            },
            )
        }
        deleteConfirmation(itemId);
        e.preventDefault();
    });

    $(document).on('click', '#clubModal', function () {
        $('#_method').val('POST');
        $('#submit').text('Submit');
        $('#exampleModalLabel').text('Add New Club');
        $('#clubForm').validate().resetForm();
        $("#itemId").removeAttr("value");
        $('#clubForm').trigger('reset');
    })
})


