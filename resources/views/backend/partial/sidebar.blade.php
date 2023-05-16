<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class=" nav-item">
      <a class="nav-link" href="{{route("dashbord")}}" aria-expanded="false">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("book-index")}}" aria-expanded="false">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Daftar Buku</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("category-index")}}" aria-expanded="false">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Kategori Buku</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("member-index")}}" aria-expanded="false">
         <i class="bi bi-people menu-icon"></i>
          <span class="menu-title">User/Member</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("loan-index")}}" aria-expanded="false">
         <i class="bi bi-people menu-icon"></i>
          <span class="menu-title">Peminjaman</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("landingpage-index")}}" aria-expanded="false">
         <i class="bi bi-people menu-icon"></i>
          <span class="menu-title">Koleksi Buku</span></a>
    </li>
  </ul>
</nav>