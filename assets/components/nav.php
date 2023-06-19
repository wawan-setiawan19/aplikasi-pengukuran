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
				<?php if(isset($_SESSION['role'])) : ?>
					<?php if($_SESSION['role'] == "user") :?>
						<li><a href="<?= $_SESSION ? $root_path."/users/progres.php": "./login.php" ?>">Pengajuan Baru</a></li>
						<li><a href="<?= $_SESSION ? $root_path."/users/cek-status.php": "./login.php" ?>">Status Pengajuan</a></li>
					<?php elseif ($_SESSION['role']=="admin") : ?>
						<nav class="sidenav">
							<ul>
								<li><a href="#">Beranda</a></li>
								<li><a href="?p=petugas">Petugas</a></li>
								<li><a href="#">Pengajuan</a></li>
							</ul>
							<button id="closeNav">&#10005;</button>
						</nav>
						<li><a href="?p=petugas">Petugas</a></li>
						<li><a href="?p=pengajuan">Pengajuan</a></li>
					<?php endif ?>
					<?php else : ?>
						<li><a href="<?= $_SESSION ? $root_path."/users/progres.php": "./login.php" ?>">Pengajuan Baru</a></li>
						<li><a href="<?= $_SESSION ? $root_path."/users/cek-status.php": "./login.php" ?>">Status Pengajuan</a></li>
					<?php endif ?>
				</ul>
				<?php if($_SESSION) : ?>
					<div>
						<?= $_SESSION['username']?>
						<a href="<?=$root_path?>/logout.php" class="btn danger">Logout</a>
					</div>
				<?php else : ?>
					<a href="./login.php">LOGIN</a>
				<?php endif ?>
		</nav>
	</header>