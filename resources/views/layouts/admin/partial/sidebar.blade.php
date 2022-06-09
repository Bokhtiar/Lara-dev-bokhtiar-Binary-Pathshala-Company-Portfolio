<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="service-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="@route('admin.service.index')">
              <i class="bi bi-circle"></i><span>List of Service</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.service.create')">
              <i class="bi bi-circle"></i><span>Create of Service</span>
            </a>
          </li>
        </ul>
      </li><!-- End service Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Portfolio-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Portfolios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Portfolio-nav" class="nav-content collapse " data-bs-parent="#Portfolio-nav">
          <li>
            <a href="@route('admin.portfolio.index')">
              <i class="bi bi-circle"></i><span>List of Portfolio</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.portfolio.create')">
              <i class="bi bi-circle"></i><span>Create of Portfolio</span>
            </a>
          </li>
        </ul>
      </li><!-- End Portfolio Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#team-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Team</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="team-nav" class="nav-content collapse " data-bs-parent="#team-nav">
          <li>
            <a href="@route('admin.team.index')">
              <i class="bi bi-circle"></i><span>List Of Team</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.team.create')">
              <i class="bi bi-circle"></i><span>Create Of Team</span>
            </a>
          </li>
        </ul>
      </li><!-- End Team Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="blog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="@route('admin.blog.index')">
              <i class="bi bi-circle"></i><span>List Of Blog</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.blog.create')">
              <i class="bi bi-circle"></i><span>Create Of Blog</span>
            </a>
          </li>
        </ul>
      </li><!-- End blog Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Setting</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#about-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="about-nav" class="nav-content collapse " data-bs-parent="#about-nav">
          <li>
            <a href="@route('admin.about.index')">
              <i class="bi bi-circle"></i><span>About</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.about.create')">
              <i class="bi bi-circle"></i><span>Create of About</span>
            </a>
          </li>
        </ul>
      </li><!-- End about Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
          @php
              $id = 1;
          @endphp
        <a class="nav-link collapsed" href="@route('admin.web-setting.create')">
          <i class="bi bi-card-list"></i>
          <span>Web Setting</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside>
