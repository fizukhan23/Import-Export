
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buyer form</h4>
                  <form class="forms-sample" action="{{url('/updatebuyer',$data->id)}}" method="POST">
                  @csrf
                   @Method('PUT') 
                   <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="name" name="name" value="@if (!empty($data)){{ $data->name }}@else{{ old('name') }}@endif" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" name="email" value="@if (!empty($data)){{ $data->email }}@else{{ old('email') }}@endif" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Number</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="number" name="number" value="@if (!empty($data)){{ $data->number }}@else{{ old('number') }}@endif" >
          </div>
          <!--<div class="form-group">-->
          <!--  <label for="exampleInputConfirmPassword1">No. Of Transections</label>-->
          <!--  <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="number" name="transection" value="@if (!empty($data)){{ $data->transection }}@else{{ old('transection') }}@endif" >-->
          <!--</div>-->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
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
