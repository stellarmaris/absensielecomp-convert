<div class="sidebar">

        <div class="logo">
            <img src="<?= base_url('/images/Logo.jpeg') ?>" alt="ELECOMP Indonesia">
            <i class="fa-solid fa-bars"></i>
        </div>
 


    <ul class="nav">
        <li class="nav-item">
            <span class="nav-header">MAIN</span>
            <a href="/home" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <span class="nav-header">APPS</span>
            <a href="/Profile" class="nav-link">
                <i class="fa-regular fa-user"></i> Profil Pengguna
            </a>
            <a href="/riwayat" class="nav-link">
                <i class="fa-regular fa-clock"></i> Riwayat Absensi
            </a>
        </li>
    </ul>
    <div class="logout">
        <a href="<?= base_url('/logout') ?>" class="nav-link">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
    </div>
</div>