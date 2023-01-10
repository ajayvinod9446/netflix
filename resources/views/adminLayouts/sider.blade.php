<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('IndexLanguage') }}">
              <i class="bi bi-circle"></i><span>Language</span>
            </a>
          </li>
          <li>
            <a href="{{ route('IndexGenres') }}">
              <i class="bi bi-circle"></i><span>Genres</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->



      <!-- End Icons Nav -->

      <li class="nav-heading">Movie</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('addMoviesIndex') }}">
          <i class="bi bi-envelope"></i>
          <span>Upload Movie</span>
        </a>
      </li>

      
      


    </ul>

  </aside>