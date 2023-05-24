
<!DOCTYPE html>
<html lang="en">

@include('layout.head')

@include('layout.nav')

<body>
  
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      @include('layout.sidebar')
      
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
           
                 
            
            <!------>
       
            
            
             <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Firm</h4>
                <form class="forms-sample" action="{{url('/updateproduct',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
                  @csrf
                    @Method('PUT')
                    <p class="card-description">
                      Product info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number of Container</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="container" name="container" value="@if (!empty($data)){{ $data->container }}@else{{ old('container') }}@endif">
                     </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="origin" name="origin" value="@if (!empty($data)){{ $data->origin }}@else{{ old('origin') }}@endif">
                                   </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Weight</label>
                          <div class="col-sm-9">
                             <input type="number" class="form-control" id="exampleInputPassword1" placeholder="weight" name="weight" value="@if (!empty($data)){{ $data->weight }}@else{{ old('weight') }}@endif">
        
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Rate of product</label>
                          <div class="col-sm-9">
                             <input type="text" class="form-control" id="exampleInputPassword1" placeholder="rate" name="rate" value="@if (!empty($data)){{ $data->rate }}@else{{ old('rate') }}@endif">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Terms of payment</label>
                          <div class="col-sm-9">
                           <select name="term" class="form-control">
                            <option value="CIF" @if (old('term') == 'CIF') selected="selected" @endif>CIF</option>
                            <option value="C&F" @if (old('term') == 'C&F') selected="selected" @endif>C&F</option>
                            <option value="C&I" @if (old('term') == 'C&I') selected="selected" @endif>C&I</option>
                            <option value="FOB" @if (old('term') == 'FOB') selected="selected" @endif>FOB</option>
                        </select>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Image</label>
                          <div class="col-sm-9">
                         <input type="file" class="form-control" id="exampleInputPassword1" placeholder="image" name="image">
                  
                           @foreach (json_decode($data->image) as $image)
                                                    <li>
                                                        <img src="{{ asset('images/product/' . $image) }}" alt="image" width="80" height="80" style="border-radius: 50%;">
                                                    </li>
                                                @endforeach
                                                                      
                             </div>
                        </div>
                      </div>
                     
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Port of delivery</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="port" name="port" value="@if (!empty($data)){{ $data->port }}@else{{ old('port') }}@endif">
         
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Shipping Lines</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="lines" name="lines" value="@if (!empty($data)){{ $data->lines }}@else{{ old('lines') }}@endif">
          
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Grade Of Product</label>
                          <div class="col-sm-9">
                           <input type="text" class="form-control" id="exampleInputPassword1" placeholder="grade" name="grade" value="@if (!empty($data)){{ $data->grade }}@else{{ old('grade') }}@endif">
          
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Free Days</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="days" name="days" value="@if (!empty($data)){{ $data->days }}@else{{ old('days') }}@endif">
         
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Validity</label>
                          <div class="col-sm-9">
                           <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="validity" name="validity" value="@if (!empty($data)){{ $data->validity }}@else{{ old('validity') }}@endif">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">date</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control" id="exampleInputConfirmPassword1" placeholder="date" name="date" value="@if (!empty($data)){{ $data->date }}@else{{ old('date') }}@endif">
        
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                     <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                      <textarea class="form-control" id="exampleInputUsername1" placeholder="description" name="description">@if (!empty($data)){{ $data->description }}@else{{ old('description') }}@endif</textarea>
     </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Suplier Id</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="supplierid" name="supplierid" value="@if (!empty($data)){{ $data->supplierid }}@else{{ old('supplierid') }}@endif">
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
       @include('layout.footer')
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
