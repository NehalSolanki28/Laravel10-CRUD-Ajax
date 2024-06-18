<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Document</title>

{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

{{-- JS Bootstrap CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

{{-- Boostrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- Toaster  --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




<style>
    .error {
        color: rgb(146, 16, 16);
        margin-top: 15px
    }

    /* HTML: <div class="loader"></div> */
    /* HTML: <div class="loader"></div> */
    .loader {
        width: 120px;
        height: 22px;
        border-radius: 20px;
        color: #514b82;
        border: 2px solid;
        position: relative;
    }

    .loader::before {
        content: "";
        position: absolute;
        margin: 2px;
        inset: 0 100% 0 0;
        border-radius: inherit;
        background: currentColor;
        animation: l6 2s infinite;
    }

    @keyframes l6 {
        100% {
            inset: 0
        }
    }
</style>
