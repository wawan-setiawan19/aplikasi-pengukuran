<?php

	$root_path = 'http://localhost/aplikasi_pengukuran';
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>
<header>
        <nav class="container">
            <div class="brand">
                <img src="<?= $root_path ?>/assets/image/Logo_BPN.png" alt="" class="brand-logo">
                <h1 class="brand-title">SiPPeTa</h1>
            </div>
			<ul>
				<li><a href="./">Beranda</a></li>
				<li><a href="<?= $_SESSION ? $root_path."/users/progres.php": "./login.php" ?>">Pengajuan Baru</a></li>
				<li><a href="<?= $_SESSION ? $root_path."/users/cek-status.php": "./login.php" ?>">Status Pengajuan</a></li>
			</ul>
			<?php if($_SESSION) : ?>
            	<div>
					<?= $_SESSION['username']?>
					<a href="<?=$root_path?>/logout.php" class="logout">Logout</a>
				</div>
			<?php else : ?>
            	<a href="./login.php">LOGIN</a>
			<?php endif ?>
		</nav>
	</header>