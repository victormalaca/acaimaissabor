<!-- Menu Charisma -->
<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="nav-header hidden-tablet">Ações</li>
			<li><a class="ajax-link" href="<?php echo $this->Html->url( array('controller' => 'Clientes', 'action' => 'index', 'plugin' => false, 'admin' => false) );?>"><i class="icon-home"></i><span class="hidden-tablet"> <b> Início </b> </span></a></li>
			<li><a class="ajax-link" href="<?php echo $this->Html->url( '/' );?>"><i class="icon-list"></i><span class="hidden-tablet"> <b> Clientes </b> </span></a></li>
			<li class="nav-list"><a class="ajax-link" href="<?php echo $this->Html->url( array('controller' => 'Clientes', 'action' => 'pesquisar', 'plugin' => false, 'admin' => false) );?>"><i class="icon-search"></i><span class="hidden-tablet"> Pesquisar </span></a></li>
			<li class="nav-list"><a class="ajax-link" href="<?php echo $this->Html->url( array('controller' => 'Clientes', 'action' => 'add', 'plugin' => false, 'admin' => false) );?>"><i class="icon-plus"></i><span class="hidden-tablet"> Cadastrar </span></a></li>
			<li><a class="ajax-link" href="<?php echo $this->Html->url( array('controller' => 'Users', 'action' => 'logout', 'plugin' => false, 'admin' => false) );?>"><i class="icon-off"></i><span class="hidden-tablet"> <b> Sair </b> </span></a></li>
		</ul>
	</div>
</div>