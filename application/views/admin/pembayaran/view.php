<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>
<?php
$bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

?>
<div class="container-fluid">
    <div class="row">
        <!-- side bar menu -->
        <?php $this->load->view('admin/template/side'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Pembayaran Kelas : <?=strtoupper($detail->nama_kelas)??""?></h1>
                <p>Jurusan : <?=strtoupper($detail->kompetensi_keahlian)??""?></p>
            </div>
            <!-- content -->
            <div> <a class="mb-4 float-right btn btn-primary btn-sm btn-insert-bayar float-right"
                    href=<?=base_url("admin/data-pembayaran/{$detail->id_kelas}/insert")?>><span
                        data-feather="plus"></a></div>

            <?php if($message=$this->session->flashdata('message')):?>
            <p class="alert alert-success"><?=$message?></p>
            <?php endif;?>
            <?php if($error=$this->session->flashdata('error')):?>
            <p class="alert alert-danger"><?=$error?></p>
            <?php endif;?>

            <div class="d-flex justify-content-center col-2">
			<div class="dropdown mb-3 col-8">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Tahun
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?tahun=semua&bulan=<?=$this->input->get('bulan')?>">Semua</a>
                    <?php
							foreach($spp as $item):
						?>
                    <a class="dropdown-item" href="?tahun=<?=$item->tahun?>&bulan=<?=$this->input->get('bulan')?>"><?=$item->tahun?></a>
                    <?php endforeach;?>
                </div>
            </div>
			<div class="dropdown mb-3 col-8">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Bulan
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?tahun=<?=$this->input->get('tahun')?>&bulan=semua">Semua</a>
                    <?php
							foreach($bulan as $item):
						?>
                    <a class="dropdown-item" href="?tahun=<?=$this->input->get('tahun')?>&bulan=<?=$item?>"><?=$item?></a>
                    <?php endforeach;?>
                </div>
            </div>
			</div>
            <div class="table-responsive mb-4">

                <table id="myTable" class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tagihan</th>
                            <th>Dibayar</th>
                            <th>Sisa Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $item): ?>
                        <tr>
                            <td><?=$item->id_pembayaran?></td>
                            <td><?=$item->nisn?></td>
                            <td><?=$item->nama_siswa?></td>
                            <td><?=$item->bulan_bayar?></td>
                            <td><?=$item->tahun_bayar?></td>

                            <td>Rp<?=number_format($item->nominal)?></td>
                            <td>Rp<?=number_format($item->jumlah_bayar)?>
                            </td>
                            <td><?php 
									$sisa=$item->nominal-($item->jumlah_bayar);
									if($sisa<=0){
										echo "Lunas";
									}else{
										echo "Rp".number_format($sisa);
									}
								?></td>
                            <td>
                                <a class="btn btn-primary btn-sm btn-update-bayar"
                                    href="<?=base_url("admin/data-pembayaran/{$detail->id_kelas}/update/{$item->id_pembayaran}")?>"><span
                                        data-feather="credit-card"></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php $this->load->view('admin/template/foot'); ?>
<script>
