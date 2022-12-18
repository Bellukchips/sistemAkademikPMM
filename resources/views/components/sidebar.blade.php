 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('dashboard') }}" class="brand-link">
         <img src="{{ asset('template/img/logo.png') }}" alt=" Logo" class="brand-image img-circle elevation-3"
             style="opacity: 0.8" />
         <span class="brand-text font-weight-light">
             {{-- @if (Auth::user()->roles == 1) --}}
             Dashboard
             {{-- @endif --}}
         </span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <div></div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 @can('admin')
                     <li class="nav-header">KABAR BERITA</li>
                     <li class="nav-item">
                         <a href="{{ route('beritaAcara.index') }}"
                             class="nav-link {{ Request::is('beritaAcara*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-newspaper"></i>
                             <p>Berita Acara</p>
                         </a>
                     </li>
                     <li class="nav-header">MASTER</li>
                     <li
                         class="nav-item {{ Request::is([
                             'kelolaUser*',
                             'kelolaTahunAkademik*',
                             'kelolaProgramAkademik*',
                             'kelolaKota*',
                             'kelolaProvinsi*',
                             'kelolaKamar*',
                             'kelolaRuangan*',
                             'kelolaKelas*',
                             'kelolaPengajar*',
                             'kelolaSantri*',
                             'kelolaPengurus*',
                             'kelolaAbsen*',
                             'kelolaPembayaran*',
                             'kelolaMapel*',
                         ])
                             ? 'menu-open'
                             : '' }}">
                         <a href="#"
                             class="nav-link {{ Request::is([
                                 'kelolaUser*',
                                 'kelolaTahunAkademik*',
                                 'kelolaProgramAkademik*',
                                 'kelolaKota*',
                                 'kelolaKamar*',
                                 'kelolaRuangan*',
                                 'kelolaKelas*',
                                 'kelolaPengajar*',
                                 'kelolaSantri*',
                                 'kelolaPengurus*',
                                 'kelolaAbsen*',
                                 'kelolaPembayaran*',
                                 'kelolaMapel*',
                             ])
                                 ? 'active'
                                 : '' }}">
                             <i class="nav-icon fas fa-archive"></i>
                             <p>
                                 Master Data
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-header">Data Pengguna</li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaUser.index') }}"
                                     class="nav-link {{ Request::is('kelolaUser*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Users</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaSantri.index') }}"
                                     class="nav-link {{ Request::is('kelolaSantri*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Santri</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaPengurus.index') }}"
                                     class="nav-link {{ Request::is('kelolaPengurus*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Pengurus</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaPengajar.index') }}"
                                     class="nav-link {{ Request::is('kelolaPengajar*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Pengajar</p>
                                 </a>
                             </li>
                             <li class="nav-header">Data Ruang</li>

                             <li class="nav-item">
                                 <a href="{{ route('kelolaKelas.index') }}"
                                     class="nav-link {{ Request::is('kelolaKelas*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kelas</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaRuangan.index') }}"
                                     class="nav-link  {{ Request::is('kelolaRuangan*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Ruangan</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaKamar.index') }}"
                                     class="nav-link {{ Request::is('kelolaKamar*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kamar</p>
                                 </a>
                             </li>
                             <li class="nav-header">Data Wilayah</li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaProvinsi.index') }}"
                                     class="nav-link {{ Request::is('kelolaProvinsi*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Provinsi</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaKota.index') }}"
                                     class="nav-link {{ Request::is('kelolaKota*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kota</p>
                                 </a>
                             </li>
                             <li class="nav-header">Data Akademik</li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaProgramAkademik.index') }}"
                                     class="nav-link {{ Request::is('kelolaProgramAkademik*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Program</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaTahunAkademik.index') }}"
                                     class="nav-link {{ Request::is('kelolaTahunAkademik*') ? 'active ' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Tahun Akademik</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaPembayaran.index') }}"
                                     class="nav-link {{ Request::is('kelolaPembayaran*') ? 'active ' : '' }} ">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Pembayaran</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaAbsen.index') }}"
                                     class="nav-link {{ Request::is('kelolaAbsen*') ? 'active ' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Absen</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('kelolaMapel.index') }}"
                                     class="nav-link {{ Request::is('kelolaMapel*') ? 'active ' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Mata Pelajaran</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-header">PERIZINAN</li>
                     <li class="nav-item">
                         <a href="{{ route('perizinan.index') }}"
                             class="nav-link {{ Request::is('perizinan*') ? 'active ' : '' }}">
                             <i class="nav-icon fas fa-user-check"></i>
                             <p>Perizinan</p>
                         </a>
                     </li>
                     <li class="nav-header">ABSENSI</li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-folder-minus"></i>
                             <p>Absensi</p>
                         </a>
                     </li>
                     <li class="nav-header">PEMBAYARAN</li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-money-check"></i>
                             <p>
                                 Pembayaran
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>SPP</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Iuran Bulanan</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <li class="nav-header">AKADEMIK</li>
                     <li class="nav-item {{ Request::is(['jadwalPelajaran*', 'jadwalPiket*']) ? 'menu-open' : '' }}">
                         <a href="#"
                             class="nav-link {{ Request::is(['jadwalPelajaran*', 'jadwalPiket*']) ? 'active' : '' }}">
                             <i class="nav-icon fas fa-archive"></i>
                             <p>
                                 Akademik
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('jadwalPelajaran.index') }}"
                                     class="nav-link {{ Request::is('jadwalPelajaran*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Jadwal Pelajaran</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('jadwalPiket.index') }}"
                                     class="nav-link {{ Request::is('jadwalPiket*') ? 'active' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Jadwal Piket</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/layout/top-nav.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kelompok Kamar</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/layout/top-nav.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kelompok Kelas</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/layout/top-nav.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Nilai</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/layout/top-nav.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Raport</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-header">File Sharing</li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-video"></i>
                             <p>Video</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-book"></i>
                             <p>E-Book</p>
                         </a>
                     </li>
                     <li class="nav-header">Laporan</li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-file-export"></i>
                             <p>Laporan</p>
                         </a>
                     </li>
                 @endcan
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
