<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin/home')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">Content</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                aria-controls="product">
                <i class="menu-icon mdi mdi-laptop"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.all')}}"> All Products </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.create')}}"> New Product </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false"
                aria-controls="order">
                <i class="menu-icon mdi mdi-view-list"></i>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('order.all')}}"> All Orders </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Users</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                aria-controls="users">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">User Accounts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.all')}}"> All Users </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">pages</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('login')}}"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('register')}}"> Register </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#store" aria-expanded="false"
                aria-controls="store">
                <i class="menu-icon mdi mdi-store"></i>
                <span class="menu-title">Store Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="store">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('store')}}"> Store </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}"> Products </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> About Us </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Contact Us </a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="nav-item nav-category">help</li>
        <li class="nav-item">
            <a class="nav-link"
                href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->