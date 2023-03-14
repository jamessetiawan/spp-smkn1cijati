<?php date_default_timezone_set("Asia/Bangkok");
$bulan = array ('Januari',
	'Februari',
	'Maret',
	'April',
	'Mei',
	'Juni',
	'Juli',
	'Agustus',
	'September',
	'Oktober',
	'November',
	'Desember'
);?>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Aplikasi SPP</a>
    <div class="text-white pr-2">
        Semangat Pagi | <?php
		echo date('d ').$bulan[date('n')-1].date(" Y, H:i:s");?>
    </div>

    <?php
			if($this->session->userdata("type")=="admin"):
		?>

    <div class="text-white"> Selamat datang <b><?=ucwords($this->session->userdata('nama')??"")?></b>
    </div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=base_url("admin/auth/logout")?>">Sign out</a>
        </li>
    </ul>
    <?php
			endif;
		?>
</nav>
