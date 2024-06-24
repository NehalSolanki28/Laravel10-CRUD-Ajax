<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headTag')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-10">
                <section class="vh-100 bg-image"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
                <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="card" style="border-radius: 15px;">
                                    <div class="card-body p-5">
                                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>
        
                                        <form action="{{route('userData')}}" method="POST" id="userForm">
                                            @csrf
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="name">Your Name</label>
                                                <input type="text" id="name"
                                                    class="form-control form-control-lg" name="name"/>
                                            </div>
        
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="email">Your Email</label>
                                                <input type="email" id="email"
                                                    class="form-control form-control-lg" name="email"/>
                                            </div>
        
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="password"
                                                    class="form-control form-control-lg" name="password"/>
                                                <label class="form-label" for="password">Password</label>
                                            </div>
        
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="confirm_password"
                                                    class="form-control form-control-lg" name="confirm_password"/>
                                                <label class="form-label" for="confirm_password">Repeat your password</label>
                                            </div>

                                            <div class="col-lg-4 mb-2">
                                                <select class="form-select" aria-label="Default select example" name="role"> 
                                                    <option selected></option>
                                                    <option value="0">User</option>
                                                    <option value="1">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id="form2Example3cg" />
                                                <label class="form-check-label" for="form2Example3g">
                                                    I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                            service</u></a>
                                                </label>
                                            </div>
        
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                            </div>
        
                                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                                    href="#!" class="fw-bold text-body"><u>Login here</u></a></p>
        
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
   
</body>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="/js/userValidation.js"></script>

</html>
