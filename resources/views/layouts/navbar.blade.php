<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<style>
    .nav .nav-item .nav-link.active {
        color: rgb(100, 100, 100);
        border-bottom: 3px solid gray;
        border-radius: 3px;
    }

    .nav .nav-item .nav-link {
        color: rgb(100, 100, 100);
        border-bottom: 3px solid gray;
        border-radius: 3px;

    }
</style>
<div class="container-fluid">
    <ul class="nav nav-underline fs-5 justify-content-center mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('clubs.index') }}">Club</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">Product</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clubs.create') }}">Add New Club</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.create') }}">Add New Product</a>
        </li>
    </ul>
</div>


