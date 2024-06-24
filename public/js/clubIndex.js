var table;
$(function () {
    
    responseData();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function responseData() {
        $('.active').removeClass('active')
        $('#clubBtn').addClass('active')
        $('.active').addClass('bg-secondary')

        table = $('.table').DataTable({
            processing: true,
            "language": {
                'loadingRecords': '&nbsp;',
                processing: '<center><div div class= "loader mt-2"></div ></center>'
            },
            paging: true,
            serverSide: true,
            ajax: "/clubs",
            "bDestroy": true,
            "pageLength": 2,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

                {data: 'club_name', name: 'club_name'},
                // {
                //     data: 'club_logo', name: 'club_logo',
                //     render: function (data, type, full, meta) {
                //         return "<img src=\"/images/club_logo/" + data + "\" height=\"80\"/>";
                //     },
                //     orderable: false,
                //     searchable: false
                // },
                { data: 'club_slug', name: 'club_slug' },
                { data: 'business_name', name: 'business_name' },
                { data: 'website_title', name: 'website_title' },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // $('tbody').html('<center><div div class= "loader mt-2"></div ></center> ');
        
        // setTimeout(function () {
        //     table = $('.table').DataTable({
        //         processing: true,
        //         "language": {
        //             processing: '<center><div div class= "loader mt-2"></div ></center>'
        //         },
        //         paging: true,
        //         serverSide: true,
        //         ajax: "/clubs",
        //         "bDestroy": true,
        //         "pageLength": 2,
        //         columns: [
        //             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
    
        //             {data: 'club_name', name: 'club_name'},
        //             {
        //                 data: 'club_logo', name: 'club_logo',
        //                 render: function (data, type, full, meta) {
        //                     return "<img src=\"/images/club_logo/" + data + "\" height=\"80\"/>";
        //                 },
        //                 orderable: false,
        //                 searchable: false
        //             },
        //             { data: 'club_slug', name: 'club_slug' },
        //             { data: 'business_name', name: 'business_name' },
        //             { data: 'website_title', name: 'website_title' },
        //             {data: 'action', name: 'action', orderable: false, searchable: false},
        //         ]
        //     });
        // }, 1000)
    };

    $('#clubBtn').on('click',function() {
        responseData();
    });

    // Edit Data
    $(document).on('click', '.edit-btn', function (e) {

        $('#clubForm').validate().resetForm();
        e.preventDefault();
        let itemId = $(this).data('id');
        $.ajax({
            url: "/clubs/" + itemId + '/edit',
            type: 'GET',
            success: function (response) {
                let url = "/images/club_logo/" + response.club.club_logo;
                
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
                $('#club_logo').hide(); 
                $('#clubLogoName').show();

                $('#club_banner').hide(); 
                $('#clubBannerName').show();

                $('#clubLogoName').html(
                    `<img src="/images/club_logo/${response.club.club_logo}" width="200px" height="200px"
                    class="clubLogo img-fluid img-thumbnail mx-3"></img>
                    <i class="close-btn bi bi-x-circle fw-bold fs-4 text-danger"></i>`
                )
                
                $('#clubBannerName').html(
                    `<img src="/images/club_banner/${response.club.club_banner}" width="200px" height="200px"
                    class="clubLogo img-fluid img-thumbnail mx-3"></img>
                    <i class="close-banner-btn bi bi-x-circle fw-bold fs-4 text-danger"></i>`
                )

                $('.close-btn').on('click', function () {
                    $('#clubLogoName').hide();
                    $('#club_logo').show(); 
                })

                $('.close-banner-btn').on('click', function () {
                    $('#clubBannerName').hide();
                    $('#club_banner').show(); 
                })

                $('#exampleModalLabel').text('Edit Club');
                $('#submit').text('Update');
                $('#createModal').modal('show');
                $('#_method').val(itemId ? 'PUT' : 'POST')
            }
        })
    })

    // Save Data & Update Data

    $('#clubForm').on('submit', function (e) {
        // console.log(table);
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
        $('#club_logo').show(); 
        $('#club_banner').show(); 
        $('#clubLogoName').hide();
        $('#clubBannerName').hide();
    })
})


