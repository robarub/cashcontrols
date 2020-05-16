<div class="row nav_bar_system">
	<div class="col-sm-3 d-flex">
		<h3>System.....</h3>
		<div class="logo ml-auto">
			<img src="<?php echo base_url(); ?>assets/assets/img/icon-menu.png" class="img-fluid"
				 alt="Icon menú">
		</div>
	</div>
	<div class="col-sm-9 d-flex">
		<div class="user-content ml-auto" style="padding-top: 0px!important;">
			<div style="color: white !important;">
				<?php if($this->session->userdata("rol")==1){?>

				<p class="mb-0 title-user">Administrador</p>
				<?php  }else{ ?>
				<p class="mb-0 title-user">Coordinador</p>
				<?php  }?>

				<p class="mb-0 user-name"><?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellido");?></p>
				<p class="mb-0 user-name"><a href="<?php echo base_url();?>">Cerrar Sesión</a></p>
			</div>
			<?php if($this->session->userdata("rol")==1){?>
				<img src="<?php echo base_url(); ?>assets/assets/img/admin-user.png" class="img-fluid"
					 alt="logo">
				<button type="button" name="button">
					<img src="<?php echo base_url(); ?>assets/assets/img/menu-arrow.png" class="img-fluid"
						 alt="flecha">
				</button>
			<?php  }else{ ?>
				<img src="<?php echo base_url(); ?>assets/assets/img/coordinador-user.png" class="img-fluid"
					 alt="logo">
				<button type="button" name="button">
					<img src="<?php echo base_url(); ?>assets/assets/img/menu-arrow.png" class="img-fluid"
						 alt="flecha">
				</button>
			<?php } ?>

		</div>
	</div>
</div>
