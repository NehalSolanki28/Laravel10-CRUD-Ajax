$(document).ready(function () {
    $('#productForm').validate({
        rules: {
            title: {
                required: true
            },
            product_title: {
                required: true
            },
            type: {
                required: true,
            },
            club_id: {
                required: {
                    depends: function (ele) {
                        return $("#club_id").val() == "";
                    }
                }
            },
        },
        messages: {
            title: 'Please Enter Title',
            product_title: 'Please Enter Product Title',
            type: {
                required: 'Please Enter Product Type',
            },
            club_id: {
                required: "Please Select Club Name From Below Given Options...."
            },
        },
    });
});
