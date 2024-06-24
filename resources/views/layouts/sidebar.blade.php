<div class="container-fluid p-0 h" style="height: 100%">
    <div class="row">
        <div class="col-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100vh" >
                {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> --}}
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-4 text-center">Ajax Crud</span>
                {{-- </a> --}}
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="{{route('clubs.index')}}" class="nav-link text-white" aria-current="page" id="clubBtn">
                      <svg class="bi me-2" width="16" height="16"></svg>
                      Club
                    </a>
                  </li>
                  <li>
                    <a href="{{route('products.index')}}" class="nav-link text-white" id="productBtn">
                      <svg class="bi me-2" width="16" height="16"></svg>
                      Product
                    </a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown mb-4">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>@ {{Auth::user()->name}}</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{route('userRegister')}}">Add New User...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('userLogOut')}}">Sign out</a></li>
                  </ul>
                </div>
              </div>
        </div>
    </div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script> --}}



