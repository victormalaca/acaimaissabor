<div class="enderecos view">
<h2><?php echo __('Endereco'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cep'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rua'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['rua']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complemento'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['complemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['observacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($endereco['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'view', $endereco['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($endereco['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $endereco['Cidade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Endereco'), array('action' => 'edit', $endereco['Endereco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Endereco'), array('action' => 'delete', $endereco['Endereco']['id']), null, __('Are you sure you want to delete # %s?', $endereco['Endereco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
