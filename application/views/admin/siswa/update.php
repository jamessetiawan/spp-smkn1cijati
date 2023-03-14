<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- side bar menu -->
        <?php $this->load->view('admin/template/side'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Ubah Data Peserta Didik Kelas : <?=strtoupper($detail->nama_kelas)??""?></h1>
            </div>
            <!-- content -->
            <form action=<?=base_url("admin/siswa/{$detail->id_kelas}/update")?> method="post">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?=$edit->nisn?>"
                        placeholder="Masukan NISN">
                </div>
                <div class="form-group">
                    <!-- <label for="nis">NIS</label> -->
                    <input type="hidden" class="form-control" name="nis" id="nis" value="<?=$edit->nis?>"
                        placeholder="Masukan NIS">
                </div>
                <div class="form-group">
                    <label for="namaSiswa">Nama lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?=$edit->nama_siswa?>"
                        placeholder="Masukan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat lengkap</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3"
                        placeholder="Masukan Alamat"><?=$edit->alamat?></textarea>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon/WA</label>
                    <input type="number" class="form-control" name="telepon" id="telepon" value="<?=$edit->no_telp?>"
                        placeholder="Masukan No Telp">
                </div>
                <div class="form-group">
                    <label for="spp">SPP</label>
                    <select name="spp" id="spp" class="form-control">
                        <option value="" disabled selected>Pilih SPP</option>
                        <?php foreach($spp as $item):?>
                        <option value="<?=$item->id_spp?>" <?=($item->id_spp==$edit->id_spp ? "selected":"")?>>
                            <?=$item->tahun?> - <?=$item->nominal?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group float-right">
                    <button type="button" onclick="history.back()" class="btn btn-primary">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </main>
    </div> <!-- /row-->
</div>


<?php $this->load->view('admin/template/foot'); ?>
