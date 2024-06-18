<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
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
                required:{
                    depends: function(ele){
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
               required : "Please Select Club Name From Below Given Options...."
            },
        },
        submitHandler: function (form) {
        form.submit();
      }
    });
    })
   
</script>
