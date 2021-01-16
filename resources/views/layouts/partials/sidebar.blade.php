 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/img/logo.png')}}" alt="Stocker Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Stocker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Eray Oğul</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->path() =='dashboard' ? "active" : "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employees') }}" class="nav-link {{ request()->path() =='employees' ? "active" : "" }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Çalışanlar
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Stok
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('manage-stock-category') }}" class="nav-link {{ request()->path() =='manage-stock-category' ? "active" : "" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Yönetimi</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('stock') }}" class="nav-link {{ request()->path() =='stock' ? "active" : "" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Yönetimi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('orders') }}" class="nav-link {{ request()->path() =='orders' ? "active" : "" }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Siparişler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('suppliers') }}" class="nav-link {{ request()->path() =='suppliers' ? "active" : "" }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Tedarikçiler
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">  
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bildirim Ayarları</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yetkiler</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>