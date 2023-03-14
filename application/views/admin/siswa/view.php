<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- side bar menu -->
        <?php $this->load->view('admin/template/side'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Peserta Didik Kelas : <?=strtoupper($detail->nama_kelas)??""?></h1>
            </div>
            <!-- content -->
            <div> <a class="mb-4 float-right btn btn-primary btn-sm btn-insert-bayar float-right"
                    href=<?=base_url("admin/data-siswa/{$detail->id_kelas}/insert")?>><span data-feather="plus"></a>
            </div>

            <?php if($message=$this->session->flashdata('message')):?>
            <p class="alert alert-success"><?=$message?></p>
            <?php endif;?>
            <?php if($error=$this->session->flashdata('error')):?>
            <p class="alert alert-danger"><?=$error?></p>
            <?php endif;?>

            <div class="table-responsive">
                <table id="myTable" class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $item):?>

                        <tr>
                            <td><?=$item->nis?></td>
                            <td><?=$item->nama_siswa?></td>
                            <td><?=strtoupper($item->nama_kelas)?></td>
                            <td><?=ucwords($item->alamat)?></td>
                            <td><?=$item->no_telp?></td>
                            <td>
							<a class="btn btn-primary btn-sm"
                                    href="<?=base_url("admin/data-siswa/{$detail->id_kelas}/update/{$item->nis}")?>">
									<span data-feather="edit-3">
								</a>
										<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah benar data ini ingin dihapus?')"
                                    href="<?=base_url("admin/siswa/{$detail->id_kelas}/delete/{$item->nis}")?>"><span data-feather="trash-2"></a>
                            </td>
                        </tr>

                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div> <!-- /row-->
</div>

<?php $this->load->view('admin/template/foot'); ?>
