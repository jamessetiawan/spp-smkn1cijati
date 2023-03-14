<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>

<div class="container-fluid mt-5">
    <div class="row">
        <!-- side bar menu -->

        <main role="main" class="col-12 col-md-4 m-auto">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Login Admin</h1>

            </div>
            <div>
                <?php 
					if(!empty($this->session->flashdata('error'))):
				?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$this->session->flashdata('error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
					endif;
				?>
            </div>
            <div>
                <form action=<?=base_url("admin/auth/check")?> method="post">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10 d-flex justify-content-between">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukan Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10 d-flex justify-content-between">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukan Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-submit w-100">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php $this->load->view('admin/template/foot'); ?>
