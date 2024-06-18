 <!-- Modal Button -->
 <div class="container mt-5">
     <button type="button" class="btn btn-info px-5 pb-2 mt-3 mb-3 text-white modal-lg" data-bs-toggle="modal"
         data-bs-target="#productModal" id="addProduct">
         Add New Product
     </button>
 </div>
 {{-- Modal Body --}}
 <div class="modal fade modal-lg" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-3 text-primary" id="productModalLabel">
                     Product Form
                 </h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <!-- Form -->
                     <form id="productForm" enctype="multipart/form-data" action="javascript:;">
                         <input type="hidden" id="productId">
                         <input type="hidden" name="_method" id="productMethod" value="POST">
                         <div class="row">
                             <div class="col-md-6">
                                 <label for="title" class="form-label">Enter Title</label>
                                 <input type="text" name="title" class="form-control" id="title">
                             </div>
                             <div class="col-md-6">
                                 <label for="product_title" class="form-label">Enter Product Title</label>
                                 <input type="text" name="product_title" class="form-control" id="product_title">
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-12">
                                 <label for="type" class="form-label">Enter Product Type</label>
                                 <input type="text" name="type" class="form-control" id="type">
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-12">
                                 <label class="visually-hidden" for="club_id">Preference</label>
                                 <select class="form-select" id="club_id" name="club_id">
                                     <option value=""></option>
                                     @foreach ($club as $element)
                                         <option value="{{ $element->id }}">{{ $element->club_name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="row px-2 mt-3">
                             <div class="col-12" id="productSubmit">
                                 <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </div>
                 </div>
                 </form>
             </div>

         </div>
     </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
     crossorigin="anonymous"></script>

 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

 <script src="/js/productValidation.js"></script>
 <script src="/js/productIndex.js"></script>
