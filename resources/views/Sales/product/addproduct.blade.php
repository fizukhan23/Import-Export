
<!DOCTYPE html>
<html lang="en">

@include('Sales.Partials.head')

@include('Sales.Partials.nav')

<body>
  
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      @include('Sales.Partials.sidebar')
      
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
           
                 
            
            <!------>
       
            
            
             <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Firm</h4>
                <form class="forms-sample" action="{{url('/savestaffproduct')}}" method="POST" enctype="multipart/form-data">
                        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
                  @csrf
                    <p class="card-description">
                      Product info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                            <input type="hidden" name="staffid" value="{{ $uniqueid }}">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number of Container</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="container" name="container" required>
                     </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="origin" name="origin" required>
                                   </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Weight</label>
                          <div class="col-sm-9">
                             <input type="number" class="form-control" id="exampleInputPassword1" placeholder="weight" name="weight" required>
        
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Rate of product</label>
                          <div class="col-sm-9">
                             <input type="text" class="form-control" id="exampleInputPassword1" placeholder="rate" name="rate" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Terms of payment</label>
                          <div class="col-sm-9">
                            <select name="term"  class="form-control" required>
                             <option>CIF</option>
                      <option>C&F</option>
                      <option>C&I</option>
                      <option>FOB</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Image</label>
                          <div class="col-sm-9">
                         <input type="file" class="form-control" id="exampleInputPassword1" placeholder="image" name="image[]" multiple='mulitiple' required>
                             </div>
                        </div>
                      </div>
                     
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Port of delivery</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="port" name="port" required>
         
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Shipping Lines</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="lines" name="lines" required>
          
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Grade Of Product</label>
                          <div class="col-sm-9">
                           <input type="text" class="form-control" id="exampleInputPassword1" placeholder="grade" name="grade" required>
          
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Free Days</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="days" name="days" required>
         
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Validity</label>
                          <div class="col-sm-9">
                           <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="validity" name="validity" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">date</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control" id="exampleInputConfirmPassword1" placeholder="date" name="date" required>
        
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                     <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                        <textarea class="form-control" id="exampleInputUsername1" placeholder="description" name="description" required></textarea>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Suplier Id</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="supplierid" name="supplierid">
                              </div>
                        </div>
                      </div>
                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <!---->
            
            
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       @include('Sales.Partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html>
