<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">


			<?php
				echo $this->Html->link(
				    $this->Html->image("logo.png", array("alt" => "Cia do Sanduiche", "height" => "70", "width" => "120")),
				    '/',
    				array('escape' => false)
				);
			?>

			<!-- user starts -->
			<div class="btn-group pull-right" >
				<a class="btn" href="#">
					<i class="icon icon-user"></i>
					<?php echo CakeSession::read('Auth.User.nome');?>
				</a>
			</div>
			<?php if( CakeSession::read('Auth.User.group_id') == 1 ): ?>
				<div class="btn-group pull-right" >
					<a class="btn" href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'pesquisar'));?>">
						<i class="icon-wrench"></i> Permissões
					</a>
				</div>
			<?php endif; ?>
			<!-- user ends -->

			<!-- div class="btn-group pull-right" id="incluir-comentario" >
				<a class="btn" href="#">
					<i class="icon icon-messages"></i> Comentários
				</a>
			</div -->

		</div>
	</div>
</div>