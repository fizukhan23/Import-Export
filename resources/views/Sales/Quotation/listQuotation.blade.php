<!DOCTYPE html>
<html lang="en">

@include('Sales.Partials.head')


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
    @include('Sales.Partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      @include('Sales.Partials.sidebar')
      
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
                    <h4 class="card-title">Product List</h4>
                  
                <!--<a href="{{ url('/addstaffproduct') }}" class="btn btn-edit float-right"><i class="ti-plus"></i> Add</a>-->
                  <div class="table-responsive">

                        <p>
                                    From: <input  type="date" id="startDate" style="width:20%;">
                                    To: <input  type="date" id="endDate" style="width:20%;">
                                  </p>
                                   <table  id="dataTable" class="table">
                            <thead>
                                
                                                 <tr>
                                                     
                                                <th>#</th>
                                                 <th> Action </th>
                                                <th>Date</th>
                                                <th>Number of container</th>
                                                <th> Origin</th>
                                                 <th>Weight </th>
                                                 <th>Rate of product</th> 
                                                <th> Terms of payment </th>
                                                <th> Port of delivery</th>
                                                 <th>Shipping Lines</th>
                                                 <th>Grade Of Product</th>
                                                 <th>Free Days</th>
                                                  <th> Validity </th>
                                                 <th> Date </th>
                                                 <th> Description </th>
                                               
                                                 <th> Product Image </th>
                                                
                                                </tr>
                            </thead>
                            <tbody>
                                             <?php $i = 1; ?>
                                             @foreach($viewdata as $u)
                                             <tr>

                                                 <td> {{ $i }} </td>
                                                 <td>
                                                     <div class="template-demo d-flex justify-content-between flex-nowrap">
                                                         <!--<a href="{{url('editstaffproduct',$u->id)}}" class="btn btn-edit">-->
                                                         <!--    <i class="ti-pencil"></i>-->
                                                         <!--</a>-->
                                                         <a href="{{url('deletestaffproduct',$u->id)}}" class="btn btn-delete">
                                                             <i class="ti-trash"></i>
                                                         </a>
                                                   <a href="https://api.whatsapp.com/send?text=
                        *Product Details*
                        %0A%0A_Number of containers:_ {{ $u->container }}
                        %0A_Origin:_ {{ $u->origin }}
                        %0A_Weight:_ {{ $u->weight }}
                        %0A_Rate of product:_ {{ $u->rate }}
                        %0A_Terms of payment:_ {{ $u->term }}
                        %0A_Port of delivery:_ {{ $u->port }}
                        %0A_Shipping Lines:_ {{ $u->lines }}
                        %0A_Grade Of Product:_ {{ $u->grade }}
                        %0A_Free Days:_ {{ $u->days }}
                        %0A%0A*Images:*%0A
                       @if ($u->image)
                        @foreach (json_decode($u->image) ?? [] as $image)
                           
                                {{ asset('images/product/' . $image) }}%0A
                            
                        @endforeach
                        @else
                       
                            {{ asset('images/product/default.png') }}%0A
                       
                        @endif
                        
                        " data-action="share/whatsapp/share" class="btn btn-success shadow btn-xs sharp me-1">
                    <i class="ti-sharethis"></i>
                </a>
                                                           </div>
                                                 </td>
                                                    <td>{{ $u->created_at }} </td>
                                                 <td> {{ $u->container }}</td>
                                                 <td> {{ $u->origin }}</td>

                                                 <td>{{ $u->weight }}</td>
                                                <td>{{ $u->rate }} </td>
                                                <td>{{ $u->term }} </td>
                                                <td>{{ $u->port }} </td>
                                                <td>{{ $u->lines }} </td>
                                                <td>{{ $u->grade }} </td>
                                                <td>{{ $u->days }} </td>
                                                <td>{{ $u->validity }} </td>
                                                <td>{{ $u->date }} </td>
                                                <td>{{ $u->description }} </td>
                                              
                                                <td>
                                             @if ($u->image)
        @foreach (json_decode($u->image) ?? [] as $image)
            <li>
                <img src="{{ asset('images/product/' . $image) }}" alt="image">
            </li>
        @endforeach
    @else
        <li>
            <img src="{{ asset('images/product/default.png') }}" alt="image">
        </li>
    @endif

   </td>
                                                 
                                                
                                                 

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
        const date = new Date(dataTable.rows[i].cells[2].innerHTML);

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
  <script src="{{asset('js/hoverable-collapse.')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html>






