<div class="sidebar">
    <div class="logo">
        <img src="<?= base_url('/images/Logo.jpeg') ?>" alt="ELECOMP Indonesia">
        <i class="fa-solid fa-bars"></i>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <span class="nav-header">MAIN</span>
            <a href="/DashboardAdmin" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <span class="nav-header">APPS</span>
            <a href="/VerifyUser" class="nav-link">
                <i class="fa-solid fa-check"></i> Verifikasi Absensi
            </a>
            <a href="/lokasiSemua" class="nav-link">
                <i class="fa-solid fa-location-dot"></i> Lokasi Pengguna
            </a>
        </li>
    </ul>
    <div class="logout">
        <a href="<?= base_url('/logout') ?>" class="nav-link">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
    </div>
</div>