<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body style="background:#eff8ff">
  <div class="d-flex min-vh-100">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary" style="max-width: 280px;" data-bs-theme="dark">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g fill="#000"><path fill-rule="evenodd" d="M20 7a3 3 0 0 1-2.608-4.484 9.768 9.768 0 0 0-.929-.142c-1.142-.124-2.581-.124-4.418-.124h-.09c-1.837 0-3.276 0-4.419.124-1.165.126-2.11.388-2.916.974A5.75 5.75 0 0 0 3.348 4.62c-.586.807-.848 1.75-.974 2.916-.124 1.143-.124 2.582-.124 4.419v.09c0 1.837 0 3.276.124 4.418.126 1.166.388 2.11.974 2.917a5.75 5.75 0 0 0 1.272 1.272c.807.586 1.75.848 2.916.974 1.143.124 2.582.124 4.419.124h.09c1.837 0 3.276 0 4.418-.124 1.166-.126 2.11-.388 2.917-.974a5.749 5.749 0 0 0 1.272-1.272c.586-.807.848-1.75.974-2.916.124-1.143.124-2.582.124-4.419v-.09c0-1.837 0-3.276-.124-4.419a9.782 9.782 0 0 0-.142-.928C21.046 6.858 20.54 7 20 7zm-2.67 1.47a.75.75 0 0 1 .343 1.003l-1.46 2.977c-1.023 2.085-4.028 1.983-4.907-.166-.39-.951-1.72-.996-2.172-.074l-1.46 2.977a.75.75 0 1 1-1.347-.66l1.46-2.977c1.023-2.085 4.028-1.983 4.907.166.39.951 1.72.996 2.172.074l1.46-2.977a.75.75 0 0 1 1.004-.344z" clip-rule="evenodd" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M18 4a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg>
        <span class="fs-4 d-none d-sm-inline-block">Admin</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto" data-bs-themes>
        <li class="nav-item">
          <a href="{{URL::to('dashboard')}}" class="nav-link rounded-0 active" aria-current="page">
            <i class="far fa-tachometer-alt-fastest fa-fw"></i>
            <span class="d-none d-sm-inline-block">Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle rounded-0 text-white" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-boxes fa-fw"></i>
    <span class="d-none d-sm-inline-block">Quản lý danh mục</span>
  </a>
  <ul class="dropdown-menu" aria-labelledby="productsDropdown">
    <li><a class="dropdown-item" href="{{URL::to('/add-category-product')}}">Thêm mới Danh mục</a></li>
    <li><a class="dropdown-item" href="{{URL::to('/all-category-product')}}">Liệt kê danh mục</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle rounded-0 text-white" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-boxes fa-fw"></i>
    <span class="d-none d-sm-inline-block">Quản lý sản phẩm</span>
  </a>
  <ul class="dropdown-menu" aria-labelledby="productsDropdown">
    <li><a class="dropdown-item" href="{{URL::to('/add-products')}}">Thêm mới sản phẩm</a></li>
    <li><a class="dropdown-item" href="{{URL::to('/all-products')}}">Liệt kê sản phẩm</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle rounded-0 text-white" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-boxes fa-fw"></i>
    <span class="d-none d-sm-inline-block">Quản lý Người dùng</span>
  </a>
  <ul class="dropdown-menu" aria-labelledby="productsDropdown">
    <li><a class="dropdown-item" href="{{URL::to('/admins')}}">Liệt kê người dùng </a></li>
    <li><a class="dropdown-item" href="{{URL::to('/createadmin')}}">Thêm mới người dùng</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle rounded-0 text-white" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-boxes fa-fw"></i>
    <span class="d-none d-sm-inline-block">Quản lý Giỏ Hàng</span>
  </a>
  <ul class="dropdown-menu" aria-labelledby="productsDropdown">
    <li><a class="dropdown-item" href="{{URL::to('/giohang')}}">Liệt kê giỏ hàng </a></li>
    <li><a class="dropdown-item" href="{{URL::to('/donhang')}}">Chi tiết đơn hàng</a></li>
  </ul>
</li>
          <a href="ratings.html" class="nav-link rounded-0 text-white">
            <i class="far fa-star-half-alt"></i>
            <span class="d-none d-sm-inline-block">Ratings</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="w-100">
      <nav class="navbar navbar-expand-md text-bg-primary" data-bs-theme="dark">
        <div class="container-fluid ps-0">
          <div class="d-flex justify-content-between w-100">
            <form class="d-flex w-100" role="search" data-bs-theme="light">
              <div class="input-group">
                <button type="submit" class="btn btn-primary rounded-0 border-white">
                  <i class="far fa-search"></i>
                </button>
                <input class="form-control me-2 rounded-0 border-white" type="search" placeholder="Search">
              </div>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto" data-bs-theme="light">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <strong><i class="fas fa-bell"></i></strong>
                </a>
                <ul class="dropdown-menu rounded-0 dropdown-menu-md-end">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{URL::to('\logout')}}">Sign out</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                  <strong>
                  <?php
        $name = Session::get('admin_name');
        if ($name) {
            echo $name;

        }
        ?>
                  </strong>
                </a>
                <ul class="dropdown-menu rounded-0 dropdown-menu-md-end">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ URL::to('/logout') }}">Sign out</a></li>

                </ul>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
      <div class="container-fluid p-4">
        <div class="d-flex justify-content-between">
      
        </div>
        @yield('admin_content')
        
      </div> 
 <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>