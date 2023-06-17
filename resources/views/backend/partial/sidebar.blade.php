{{-- 
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashbord') }}" aria-expanded="true">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if (Auth::user()->role == "admin")
    <li class="nav-item">
      <a class="nav-link" href="{{ route('book-index') }}" aria-expanded="false">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Daftar Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('category-index') }}" aria-expanded="false">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Kategori Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('member-index') }}" aria-expanded="false">
        <i class="bi bi-people menu-icon"></i>
        <span class="menu-title">User/Member</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('loan-index') }}" aria-expanded="false">
        <i class="bi bi-people menu-icon"></i>
        <span class="menu-title">Peminjaman</span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('landingpage-index') }}" aria-expanded="false">
        <i class="bi bi-people menu-icon"></i>
        <span class="menu-title">Koleksi Buku</span>
      </a>
    </li>
  </ul>
</nav>

--}}


<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ (request()->is('home')) ? '' : 'collapsed'}}" href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    {{-- {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Alerts</span>
          </a>
        </li>
        <li>
          <a href="components-accordion.html">
            <i class="bi bi-circle"></i><span>Accordion</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Badges</span>
          </a>
        </li>
        <li>
          <a href="components-breadcrumbs.html">
            <i class="bi bi-circle"></i><span>Breadcrumbs</span>
          </a>
        </li>
        <li>
          <a href="components-buttons.html">
            <i class="bi bi-circle"></i><span>Buttons</span>
          </a>
        </li>
        <li>
          <a href="components-cards.html">
            <i class="bi bi-circle"></i><span>Cards</span>
          </a>
        </li>
        <li>
          <a href="components-carousel.html">
            <i class="bi bi-circle"></i><span>Carousel</span>
          </a>
        </li>
        <li>
          <a href="components-list-group.html">
            <i class="bi bi-circle"></i><span>List group</span>
          </a>
        </li>
        <li>
          <a href="components-modal.html">
            <i class="bi bi-circle"></i><span>Modal</span>
          </a>
        </li>
        <li>
          <a href="components-tabs.html">
            <i class="bi bi-circle"></i><span>Tabs</span>
          </a>
        </li>
        <li>
          <a href="components-pagination.html">
            <i class="bi bi-circle"></i><span>Pagination</span>
          </a>
        </li>
        <li>
          <a href="components-progress.html">
            <i class="bi bi-circle"></i><span>Progress</span>
          </a>
        </li>
        <li>
          <a href="components-spinners.html">
            <i class="bi bi-circle"></i><span>Spinners</span>
          </a>
        </li>
        <li>
          <a href="components-tooltips.html">
            <i class="bi bi-circle"></i><span>Tooltips</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav --> --}}

    <!-- End Blank Page Nav -->

    @if (Auth::user()->role == "admin")
    <li class="nav-item">
      <a class="nav-link {{ (request()->is('book/*')) ? '' : 'collapsed'}}" href="{{ route('book-index') }}">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Daftar Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (request()->is('category/*')) ? '' : 'collapsed'}}" href="{{ route('category-index') }}">
        <i class="bi bi-journal-text"></i>
        <span class="menu-title">Kategori Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (request()->is('member/*')) ? '' : 'collapsed'}}" href="{{ route('member-index') }}">
        <i class="bi bi-people menu-icon"></i>
        <span class="menu-title">User/Member</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (request()->is('loan/*')) ? '' : 'collapsed'}}" href="{{ route('loan-index') }}">
        <i class="bi bi-person-lines-fill"></i>
        <span class="menu-title">Peminjaman</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (request()->is('return')) ? '' : 'collapsed'}}" href="{{ route('loan-return') }}">
        <i class="bi bi-journal-bookmark-fill"></i>
        <span class="menu-title">Pengembalian</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="bi bi-file-text"></i>
        <span class="menu-title">Pengembalian</span>
      </a>
    </li> --}}
    @endif
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('landingpage-index') }}">
        <i class="bi bi-journals"></i>
        <span class="menu-title">Koleksi Buku</span>
      </a>
    </li>

  </ul>

</aside>