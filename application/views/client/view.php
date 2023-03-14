<?php $this->load->view('client/template/head'); ?>
<?php $this->load->view('client/template/header'); ?>
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-12 ml-sm-auto px-md-4">
            <div
                class="d-flex justify-content-between flex-column flex-md-row align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Siswa </h1>
                <p>Halo, <?=$siswa->nama_siswa?></p>
            </div>
            <div class="col-12 col-md-8 m-auto">
                <h3>Information:</h3>
                <table class="table col-12">
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?=$siswa->nis?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$siswa->nama_siswa?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?=strtoupper($siswa->nama_kelas)?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td><?=ucwords($siswa->kompetensi_keahlian)?></td>
                    </tr>
                </table>
                <h3>Pembayaran:</h3>
                <div class="dropdown mb-3">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Tahun
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=base_url('client/dashboard')?>">Semua</a>
                        <?php
							foreach($spp as $item):
						?>
							<a class="dropdown-item" href="?tahun=<?=$item->tahun?>"><?=$item->tahun?></a>
						<?php endforeach;?>
                    </div>
                </div>
                <table class="table col-12">
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Nominal</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa</th>
                    </tr>
                    <?php
						$tunggakan=0;
						foreach($pembayaran as $item):
					?>
                    <tr>
                        <td>
                            <?=$item->tahun_bayar?>
                        </td>
                        <td>
                            <?=$item->bulan_bayar?>
                        </td>
                        <td>
                            <?="Rp".number_format($item->nominal)?>
                        </td>
                        <td>
                            <?="Rp".number_format($item->jumlah_bayar)?>
                        </td>
                        <td><?php 
							$sisa=0;
							$sisa=($item->nominal-$item->jumlah_bayar)??0;
							$tunggakan=$tunggakan+$sisa;

							if($sisa<=0){
								echo "Lunas";
							}else{
								echo "Rp".number_format($sisa);
							}
						?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php
						if($pembayaran):
					?>
                    <tr>
                        <td colspan="4">Jumlah Tunggakan</td>
                        <td>:
                            <?php
							if($tunggakan<=0){
								echo "Tidak Ada";
							}else{
								echo "Rp".number_format($tunggakan);
							}

							?>
                        </td>
                    </tr>
                    <?php else:?>
                    <tr>
                        <td colspan="5">Tidak Ada Data</td>

                    </tr>
                    <?php endif;?>
                </table>
            </div>
        </main>
    </div>
</div>


<?php $this->load->view('client/template/foot'); ?>
