<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow flex-column text-center text-md-left flex-md-row">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?=base_url('./')?>">SPP Sekolah</a>
        
        <?php
			if($this->session->userdata("type")=="client"):
		?>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=base_url("client/auth/logout")?>">Sign out</a>
        </li>
    </ul>
    <?php
			endif;
		?>
    </nav>
