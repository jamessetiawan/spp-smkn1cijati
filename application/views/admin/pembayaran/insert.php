<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>
<?php 
$bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
$bulan_ini=$this->session->userdata('bulan')??$bulan[date('n')-1];
$tahun_ini=$this->session->userdata('tahun')??date('Y');
?>

<div class="container-fluid">
    <div class="row">
        <!-- side bar menu -->
        <?php $this->load->view('admin/template/side'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Data Pembayaran Kelas : <?=strtoupper($detail->nama_kelas)??""?></h1>
                <p>Jurusan : <?=strtoupper($detail->kompetensi_keahlian)??""?></p>
            </div>

            <form action=<?=base_url("admin/pembayaran/{$detail->id_kelas}/insert")?> method="post">
                
                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10 d-flex justify-content-between">
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukan NISN"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="spp" class="col-sm-2 col-form-label">Tahun SPP</label>
                    <div class="col-sm-10">
                        <select name="spp" id="spp" class="form-control">
                            <option value="" selected disabled>Pilih Tahun</option>
                            <?php foreach($spp as $item):?>
                            <option value="<?=$item->id_spp?>" <?=($item->tahun==$tahun_ini ? "selected":"")?>>
                                <?=$item->tahun?> - <?=$item->nominal?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-10">
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="" selected disabled>Pilih</option>
                            <?php foreach($bulan as $item):?>
                            <option value="<?=$item?>" <?=($item==$bulan_ini ? "selected":"")?>><?=$item?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jml_pembayaran" class="col-sm-2 col-form-label">Bayar</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jml_pembayaran" name="jml_pembayaran"
                            placeholder="Tuliskan tanpa titik (.) cth: 600000" required>
                    </div>
                </div>
                <div class="form-group row float-right">
                    <div class="col-12">
						<button type="button" onclick="history.back()" class="btn btn-primary">Kembali</button>
                        <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>


<?php $this->load->view('admin/template/foot'); ?>
<script>
