 <!-- Modal Button -->

 <div class="container mt-5">
     <div class="row">
         <div class="col-lg-4 fs-4 mt-2">
             {{-- {{Auth::user()->userName}} --}}
         </div>
         <div class="col-lg-8 d-flex justify-content-end">
             <button type="button" data-mdb-button-init data-mdb-ripple-init
                 class="btn btn-outline-dark px-4 fw-bold border-2" data-mdb-ripple-color="dark" data-bs-toggle="modal"
                 data-bs-target="#createModal" id="clubModal">
                 Add New Club
             </button>
         </div>
     </div>
 </div>
 {{-- Modal Body --}}
 <div class="modal fade modal-lg" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">
                     Add New Club
                 </h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <!-- Form -->
                     <form id="clubForm" enctype="multipart/form-data" action="javascript:;">
                         {{-- @csrf --}}
                         <input type="hidden" id="itemId">
                         
                         <input type="hidden" name="_method" id="_method" value="POST">

                         <div class="row">
                             <div class="col-lg-6">
                                 <input type="text" name="club_name" class="form-control" id="club_name"
                                     placeholder="Club Name">
                             </div>
                             <div class="col-lg-6">
                                 <input type="text" name="club_state" class="form-control" id="club_state"
                                     placeholder="Club State">
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-md-6">
                                 <input type="number" name="club_number" class="form-control" id="club_number"
                                     placeholder="Club Number">
                             </div>
                             <div class="col-md-6">
                                 <input type="text" name="club_slug" class="form-control" id="club_slug"
                                     placeholder="Club Slug">
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-md-6">
                                 <input type="text" name="business_name" class="form-control" id="business_name"
                                     placeholder="Club Business Name">
                             </div>
                             <div class="col-md-6">
                                 <input type="number" name="group_id" class="form-control" id="group_id"
                                     placeholder="Group Id">
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-12">
                                 <textarea class="form-control" name="club_description" placeholder="Leave a comment here" id="club_description"></textarea>
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-md-6">
                                 <input type="text" name="website_title" class="form-control" id="website_title"
                                     placeholder="Website Title">
                             </div>
                             <div class="col-md-6">
                                 <input type="text" name="website_link" class="form-control" id="website_link"
                                     placeholder="Website Link">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6 mt-3 ms-3" id="clubLogo">
                                 <label for="clubLogo" class="form-label fw-bold">Club Logo</label>
                                 <input type="file" class="form-control" name="club_logo" id="club_logo" multiple>
                                 <div id="clubLogoName">

                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6 px-2 mt-3">
                             <div class="col-12">
                                 <label for="clubBanner" class="form-label">Club Banner</label>
                                 <input class="form-control" name="club_banner" type="file" id="club_banner"
                                     multiple>
                                 <div id="clubBannerName">

                                 </div>
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-12">
                                 <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>
         </div>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
     crossorigin="anonymous"></script>

 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

 <script src="/js/clubValidation.js"></script>
 <script src="/js/clubIndex.js"></script>
