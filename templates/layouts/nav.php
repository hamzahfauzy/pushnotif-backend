<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation" style="justify-content:inherit">
            <li class="nav-item <?=!isset($_GET['r']) || $_GET['r'] == 'default/index' ? 'active' : ''?>">
                <a class="nav-link" href="index.php">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Home</span>
                </a>
            </li>
            
            <?php $auth = auth(); if($auth->role_name == 'Admin'): ?>
            <li class="nav-item <?=isset($_GET['r']) && $_GET['r'] == 'notifications/index' ? 'active' : ''?>">
                <a class="nav-link" href="#">
                <i class="ti-bell menu-icon"></i>
                <span class="menu-title">Log Notifikasi</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?=isset($_GET['type']) && $_GET['type'] == 'employee' ? 'active' : ''?>"><a class="nav-link" href="index.php?r=notifications/index&type=employee">Notifikasi Pegawai</a></li>
                        <li class="nav-item <?=isset($_GET['type']) && $_GET['type'] == 'broadcast' ? 'active' : ''?>"><a class="nav-link" href="index.php?r=notifications/index&type=broadcast">Notifikasi Broadcast</a></li>
                        <li class="nav-item <?=isset($_GET['type']) && $_GET['type'] == 'schedule' ? 'active' : ''?>"><a class="nav-link" href="index.php?r=notifications/index&type=schedule">Notifikasi Terjadwal</a></li>
                    </ul>
                </div>
            </li>
            <?php endif ?>
        </ul>
    </div>
</nav>