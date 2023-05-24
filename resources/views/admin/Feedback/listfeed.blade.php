<!DOCTYPE html>
<html lang="en">

@include('layout.head')


<style>
    .content-wrapper {
    background: #dddce1;
    padding: 1.5rem 2.5rem;
    width: 172%;
    -webkit-flex-grow: 1;
    flex-grow: 1;
}
.d-flex a {
    margin-left: 12px;
}

  /* Table styles */
  .table {
    border-collapse: collapse;
    width: 100%;
  }

  .table th,
  .table td {
    padding: 12px 15px;
    text-align: left;
    border-top: 1px solid #ddd;
    border-left: none;
    border-right: none;
  }

  .table th {
    background-color: #f5f5f5;
  }

  .table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Button styles */
  .btn {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #0062cc;
  }

  .btn-edit {
    background-color: #93266f;
  }

  .btn-delete {
    background-color: #dc3545;
  }
  .alert-success{
    background-color: #faebd7;
  }

  .btn-icon {
    margin-right: 5px;
  }
</style>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layout.nav')
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
             @if(session()->has('msg'))
            <div class="alert alert-success">
               {{ session()->get('msg') }}
           </div>
            @endif

                <div class="card-body">
                    <h4 class="card-title">Feedback List</h4>
                  
                  <div class="table-responsive">

                        <p>
                                    From: <input  type="date" id="startDate" style="width:20%;">
                                    To: <input  type="date" id="endDate" style="width:20%;">
                                  </p>
                                   <table  id="dataTable" class="table">
                            <thead>
                                
                                                 <tr>
                                                     
                                                <th>#</th>
                                               
                                                <th>Message</th>
                                              
                                                <th>Date</th>
                                                 
                                                </tr>
                            </thead>
                            <tbody>
                                             <?php $i = 1; ?>
                                             @foreach($viewdata as $u)
                                             <tr>

                                                 <td> {{ $i }} </td>
                                               
                                               
                                                 <td> {{ $u->message }}</td>
                                                
                                              
                                              
                                              
                                                    <td>{{ $u->created_at }} </td>
                                                
                                                 

                                             </tr>
                                             <?php $i++; ?>
                                             @endforeach
                                         </tbody>
                        </table>
                          {{ $viewdata->links() }}

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <script>
    const startDateInput = document.querySelector("#startDate");
    const endDateInput = document.querySelector("#endDate");
    const dataTable = document.querySelector("#dataTable");

    startDateInput.addEventListener("input", filterData);
    endDateInput.addEventListener("input", filterData);

    function filterData() {
      const startDate = new Date(startDateInput.value);
      const endDate = new Date(endDateInput.value);

      for (let i = 1; i < dataTable.rows.length; i++) {
        const date = new Date(dataTable.rows[i].cells[3].innerHTML);

        if (date >= startDate && date <= endDate) {
          dataTable.rows[i].style.display = "table-row";
        } else {
          dataTable.rows[i].style.display = "none";
        }
      }
    }
  </script>
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
  <script src="{{asset('js/hoverable-collapse.')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html>






