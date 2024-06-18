<table class="table">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Club Name</th>
            <th scope="col">Club Logo</th>
            <th scope="col">Club Slug</th>
            <th scope="col">Business Name</th>
            <th scope="col">Website Title</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider" id="tableData">
        @if(sizeof($club))
            @foreach ($club as $ele)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $ele->club_name }}</td>
                    <td>
                        <img src="/images/club_logo/{{ $ele->club_logo }}" alt="" height="100px" width="110px"  background-image:none>
                    </td>
                    <td>{{ $ele->club_slug }}</td>
                    <td>{{ $ele->business_name }}</td>
                    <td>{{ $ele->website_title }}</td>
                    <td>
                        <div class="row">
                            <div class="col-lg-6">
                                <i class="edit-btn bi bi-pencil-square" data-id="{{ $ele->id }}"></i>
                            </div>
                            <div class="col-lg-6">
                                <i class="delete-btn bi bi-x-circle" data-id="{{ $ele->id }}"></i>
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


