<table class="table ms-2">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Product Title</th>
            <th scope="col">Title</th>
            <th scope="col">Club Name</th>
            <th scope="col">Product Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody id="productTable">
        @if(sizeof($product))
            @foreach ($product as $element)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $element->product_title }}</td>
                    <td>{{ $element->title }}</td>
                    <td>{{ $element->clubs->club_name }}</td>
                    <td>{{ $element->type }}</td>
                    <td>
                        <div class="row">
                            <div class="col-lg-6">
                                <i class="product-edit-btn bi bi-pencil-square" data-id="{{ $element->id }}"></i>
                            </div>
                            <div class="col-lg-6">
                                <i class="product-delete-btn bi bi-x-circle" data-id="{{ $element->id }}"></i>
                            </div>
                        </div>
                    </td>
    
                </tr>
            @endforeach
        
            @else
            <tr>
                <th colspan="100%" class="text-center">No Data Found</th>
            </tr>
        @endif

    </tbody>
</table>


