<div id="message">
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            {{ Session('success') }}
        </div>
    @endif
    @if (Session::has('productSuccess'))
        <div class="alert alert-success text-center">
            {{ Session('productSuccess') }}
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous">
</script>

<script>
    $(function() {
        setTimeout(function() {
            $("#message").slideToggle();
        }, 2000);
    });
</script>
