<script type="text/javascript">
	$(document).ready(function (){
		$("#UserUsername").focus();
	});
</script>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="row-fluid">
			<div class="span12 center login-header">
				<?php echo $this->Html->image("logo.png", array("alt" => "Cia do Sanduiche", "height" => "150", "width" => "250")); ?>
			</div>
		</div><br/><br/><br/><br/>
		
		<div class="row-fluid">
			<div class="well span5 center login-box">
				<div class="alert alert-info"> Favor fornecer o seu Usuário e Senha. </div>

				<?php echo $this->Form->create( 'User', array( 'action' => 'login', 'class' => 'form-horizontal' ) ); ?>

					<fieldset>

						<div class="input-prepend" data-rel="tooltip" data-original-title="Usuário" data-placement="right">
							<span class="add-on"><i class="icon-user"></i></span>
							<?php echo $this->Form->input('username', array( 'label' => false, 'div' => false, 'class' => 'input-large span10', 'autocomplete' => 'off', 'required', /*'autofocus'*/ ) ); ?>
						</div>

						<div class="clearfix"></div>

						<div class="input-prepend" data-rel="tooltip" data-original-title="Senha" data-placement="right">
							<span class="add-on"><i class="icon-lock"></i></span>
							<?php echo $this->Form->input('password', array( 'label' => false, 'div' => false, 'class' => 'input-large span10', 'type'=>'password', 'autocomplete' => 'off', 'required' ) ); ?>
						</div><br/>

						<p class="center span5">
							<button class="btn btn-primary" type="submit">Login</button>
						</p>

						<div class="clearfix"></div>

					</fieldset>

				<?php echo $this->Form->end();?>

			</div>
		</div>
	</div>
</div>