<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
              <i class="bi bi-bank"></i>
              <span>Beranda</span>
            </a>
        </li>
        @if (auth()->user()->role_id == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/user">
              <i class="bi bi-people-fill"></i>
              <span>Manajemen User</span>
            </a>
        </li>
        @elseif(auth()->user()->role_id == 2)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/jabatan">
              <i class="bi bi-clipboard"></i>
              <span>Jabatan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="karyawan">
              <i class="bi bi-person"></i>
              <span>Karyawan</span>
            </a>
        </li>

        @elseif(auth()->user()->role_id == 3)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/produk">
              <i class="bi bi-easel"></i>
              <span>Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="/pembelian">
                  <i class="bi bi-circle"></i><span>Pembelian</span>
                </a>
              </li>
              <li>
                <a href="/penjualan">
                  <i class="bi bi-circle"></i><span>Penjualan</span>
                </a>
              </li>
            </ul>
        </li>
        @endif
    </ul>
</aside>
