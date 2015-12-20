<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div data-original-title="" class="box-header well">
			<h2>
				<i class="icon-list"></i> Listagem dos Usuários Cadastrados
			</h2>
			<div class="box-icon">
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i>
				</a> <a class="btn btn-close btn-round" href="#"><i	class="icon-remove"></i>
				</a>
			</div>
		</div>

		<div class="box-content">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper"	role="grid">
				<table id="tb_users" class="dynamicTable table table-striped table-bordered" colunas="5" acoes="view,edit,delete" controller="Users">
					<thead>
						<tr>
							<?php echo $this->Html->tableHeaders( array( 'Id', 'Nome','Login', 'Permissão', 'Ações' ) );  ?>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<br /><br />
			<a class="btn btn-large btn-primary" href="<?php echo $this->Html->url( array('controller' => 'Users', 'action' => 'add') );?>">
				<i class="icon-plus icon-white"></i><strong> Cadastrar Usuário </strong>
			</a>
			<br /><br />
		</div>
	</div>
</div>