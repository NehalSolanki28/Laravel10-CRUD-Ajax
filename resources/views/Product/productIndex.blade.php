<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headTag')
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-2">
                <div class="left-panel">
                    @include('layouts.sidebar')
                </div>
            </div>
            <div class="col-lg-10">
                <header>
                    @include('Product.productModal')
                </header>
                <section>
                    <div class="container mt-5" id="productPage">

                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
