<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
            <a class="d-flex align-items-center text-muted" style="text-decoration:none" href="<?= base_url('admin') ?>">
                <span> <span data-feather="home"></span> Dashboard <span class="sr-only">(current)</span> | <b><?=$this->session->userdata('level')?></b>
                </span>
            </a>
        </h6>
        <ul class="nav flex-column">

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span><span data-feather="credit-card"></span> Data Pembayaran</span>
                <a class="d-flex align-items-center text-muted">
                    <span data-toggle="collapse" href="#pembayaran_list" role="button" aria-expanded="false"
                        aria-controls="pembayaran_list">
                        <span data-feather="chevron-down" class="down"></span>
                        <span data-feather="chevron-up" class="up"></span>
                    </span>
                </a>
            </h6>
            <div class="collapse m-2 rounded" id="pembayaran_list"
                style="max-height:200px;background:#eee;overflow:auto">
                <?php foreach($kelas as $item):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/data-pembayaran/'.$item->id_kelas) ?>">
                        <span data-feather="chevron-right"></span> Pembayaran <?=strtoupper($item->nama_kelas)?>
                    </a>
                </li>
                <?php endforeach;?>
            </div>

			<?php  if($this->session->userdata('level')=="admin"): ?>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span> <span data-feather="users"></span> Data siswa</span>
                <a class="d-flex align-items-center text-muted">
                    <span data-toggle="collapse" href="#data_list" role="button" aria-expanded="false"
                        aria-controls="data_list">
                        <span data-feather="chevron-down" class="down"></span>
                        <span data-feather="chevron-up" class="up"></span>
                    </span>

                </a>
            </h6>
            <div class="collapse m-2 rounded" id="data_list" style="max-height:200px;background:#eee;overflow:auto">
                <?php foreach($kelas as $item):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/data-siswa/'.$item->id_kelas) ?>">
                        <span data-feather="chevron-right"></span> Data Kelas <?=strtoupper($item->nama_kelas)?>
                    </a>
                </li>
                <?php endforeach;?>
            </div>
			<?php  endif ?>


        </ul>


    </div>
</nav>
