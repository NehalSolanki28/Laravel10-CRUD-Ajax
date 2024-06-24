<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headTag')
    <link rel="stylesheet" href="/css/club.css">   
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 bg-secondary-subtle">
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
                <div class="card bg-white me-5 mt-5 p-5 shadow-lg rounded-4">
                    <section>
                        <div class="container mt-5 w-100" id="productPage">
                            
                        </div>
                        <div id="productPaginate">

                        </div>
                    </section>
                </div>


            </div>
        </div>
    </div>

</body>

</html>
