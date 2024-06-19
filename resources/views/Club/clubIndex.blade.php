<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headTag')
    <link rel="stylesheet" href="/css/club.css">   
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
                    @include('Club.clubModal')
                </header>
                <div class="card bg-white me-5 mt-5 p-5 shadow-lg rounded-4">
                    <section>
                        <div class="container mt-5" id="parent">
                            <table class="table table-striped table-bordered text-center ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Club Name</th>
                                        {{-- <th scope="col">Club Logo</th> --}}
                                        <th scope="col">Club Slug</th>
                                        <th scope="col">Business Name</th>
                                        <th scope="col">Website Title</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider" id="tableData">
                                </tbody>
                            </table>
    
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

</html>
