<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blog*') ? 'active' : '' }}" href="/dashboard/blog">
            <span data-feather="file-text"></span>
            My Blog
          </a>
        </li>
      </ul>

      @can('admin') {{-- variable admin ngambil dari folder provider appserviceprovider--}}
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center mt-4 px-3 mb-2 text-muted">
        <span>
          Administrator
        </span>
      </h6>
      <ul class="nav flex-column">
       <li class="nav-item">
         <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
           <span data-feather="file-text"></span>
           Kategori
         </a>
       </li>
      </ul>
      @endcan
    </div>
  </nav>