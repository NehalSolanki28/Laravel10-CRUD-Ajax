$(function () {
    productData();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function productData() {
        $('.active').removeClass('active')
        $('#productBtn').addClass('active') 

        $('#productPage').html('<center><div div div class= "loader" ></div ></center > ');

            setTimeout(function () {
                $.ajax({
                    url: '/products',
                    type: 'GET',
                    cache: false,
                    success: function (response) {
                        $('#productPage').html(response);
                    }
                });
            }, 1000)
        }

    $('#productBtn').on('click', function () {
        productData();
    })


    // Edit Btn
    $(document).on('click', '.product-edit-btn', function () {
        let productId = $(this).data('id');
        $.ajax({
            url: '/products/' + productId + '/edit',
            type: 'GET',
            success: function (response) {
                $('#productId').val(productId);
                $('#title').val(response.product.title);
                $('#product_title').val(response.product.product_title);
                $('#type').val(response.product.type);
                $('#club_id').val(response.product.club_id);


                $('#productModal').modal('show');
                $('#productModalLabel').text('Edit Product');
                $('#submit').text('Update');
                $('#productMethod').val(productId ? 'PUT' : 'POST');
            }
        })
    })

    // Submit & Update Product ....

    $('#productForm').on('submit', function (e) {
        e.preventDefault();
        // $('#productForm').validate().resetForm();
        let productId = $('#productId').val();
        let url = productId ? '/products/' + productId : '/products';
        let productFormData = new FormData(this);
        if (!$(this).valid()) {
            return false
        }
        $.ajax({
            url: url,
            type: 'POST',
            data: productFormData,
            datatype: 'JSON',
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
                    productData();
                }
                $('#productModal').modal('hide');
                $('#productForm').trigger('reset');

            },
            error: function (error) {
                console.log(error);

            }
        })
    })


    // Delete Product
    $(document).on('click', '.product-delete-btn', function (e) {
        let products = $(this).data('id');
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
                        url: '/products/' + products,
                        type: 'delete',
                        success: function (response) {
                            Swal.fire("Done!", response.message, "success");
                            productData();
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
        deleteConfirmation(productId);
        e.preventDefault();
    })
    $(document).on('click', '#addProduct', function () {
        $('#productForm').trigger('reset');
        $('#submit').text('Submit');
        $('#productForm').validate().resetForm();
        $("#productId").removeAttr("value");
        $('#productMethod').val('POST');
        $('#productModalLabel').text('Add New Product');

    })
})

// if (error.status == 422) {
// // when status code is 422, it's a validation issue
// console.log(error.responseJSON);
// console.warn(error.responseJSON.errors);
// $.each(error.responseJSON.errors, function (i, error) {
// var element = $(document).find('[name="' + i + '"]');
// element.after($('<span style="color: red;">'+error[0]+'</span>'));
// });
// }
