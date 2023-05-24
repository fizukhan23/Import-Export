<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    
    <li class="nav-item">
      <a class="nav-link" href="{{url('Dashbaord')}}">
        <i class="ti-shield menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" data-target="#users-menu" aria-expanded="false" aria-controls="users-menu">
        <i class="ti-user menu-icon"></i>
        <span class="menu-title">Users Menu</span>
        <i class="menu-arrow"></i>


      </a>
      <div class="collapse" id="users-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{url('listbuyer')}}">Buyers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('listtsellers')}}">Sellers</a>
          </li>
        </ul>
      </div>
    </li>
   <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" data-target="#sales-menu" aria-expanded="false" aria-controls="sales-menu">
    <i class="ti-money menu-icon"></i>
    <span class="menu-title">Office Staff Menu</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="sales-menu">
    <ul class="nav flex-column sub-menu">
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('liststaff')}}">View staff</a>
      </li>
    </ul>
  </div>
</li>

    <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" data-target="#product-menu" aria-expanded="false" aria-controls="purchase-menu">
    <i class="ti-palette menu-icon"></i>
    <span class="menu-title">Quotation Menu</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="product-menu">
    <ul class="nav flex-column sub-menu">
     
      <li class="nav-item">
        <a class="nav-link" href="{{ url('listQuatation') }}">View quotation</a>
      </li>
    </ul>
  </div>
</li>


    <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" data-target="#payment-menu" aria-expanded="false" aria-controls="payment-menu">
    <i class="ti-palette menu-icon"></i>
    <span class="menu-title">Product Menu</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="payment-menu">
    <ul class="nav flex-column sub-menu">
     
      <li class="nav-item">
        <a class="nav-link" href="{{ url('listsells') }}">View Product</a>
      </li>
    </ul>
  </div>
</li>

<!--<li class="nav-item">-->
<!--  <a class="nav-link" data-toggle="collapse" data-target="#purches-menu" aria-expanded="false" aria-controls="purches-menu">-->
<!--    <i class="ti-palette menu-icon"></i>-->
<!--    <span class="menu-title">Purchase Menu</span>-->
<!--    <i class="menu-arrow"></i>-->
<!--  </a>-->
<!--  <div class="collapse" id="purches-menu">-->
<!--    <ul class="nav flex-column sub-menu">-->
     
<!--      <li class="nav-item">-->
<!--        <a class="nav-link" href="{{ url('listpurchase') }}">View Purchase</a>-->
<!--      </li>-->
<!--    </ul>-->
<!--  </div>-->
<!--</li>-->

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" data-target="#feedback-menu" aria-expanded="false" aria-controls="feedback-menu">
    <i class="ti-palette menu-icon"></i>
    <span class="menu-title">Feedback Menu</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="feedback-menu">
    <ul class="nav flex-column sub-menu">

      <li class="nav-item">
        <a class="nav-link" href="{{ url('listfeedback') }}">View Feedback</a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('listnotify') }}">
    <i class="ti-view-list-alt menu-icon"></i>
    <span class="menu-title">Notification</span>
  </a>
</li>
</nav>