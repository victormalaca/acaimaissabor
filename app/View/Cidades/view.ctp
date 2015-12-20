<div class="cidades view">
<h2><?php echo __('Cidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cidade['Estado']['nome'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cidade'), array('action' => 'edit', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), null, __('Are you sure you want to delete # %s?', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('controller' => 'enderecos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enderecos'); ?></h3>
	<?php if (!empty($cidade['Endereco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Rua'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cidade['Endereco'] as $endereco): ?>
		<tr>
			<td><?php echo $endereco['id']; ?></td>
			<td><?php echo $endereco['cep']; ?></td>
			<td><?php echo $endereco['rua']; ?></td>
			<td><?php echo $endereco['numero']; ?></td>
			<td><?php echo $endereco['bairro']; ?></td>
			<td><?php echo $endereco['complemento']; ?></td>
			<td><?php echo $endereco['observacao']; ?></td>
			<td><?php echo $endereco['cliente_id']; ?></td>
			<td><?php echo $endereco['cidade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enderecos', 'action' => 'view', $endereco['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enderecos', 'action' => 'edit', $endereco['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enderecos', 'action' => 'delete', $endereco['id']), null, __('Are you sure you want to delete # %s?', $endereco['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
