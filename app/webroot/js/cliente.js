$(document).ready(function (){
	
		// coloca a mascara de telefones e cep
		$("#ClienteFoneFixo,#ClienteFoneComercial,#ClienteFoneCelular").mask("(99) 9999-9999");
		$("#EnderecoCep").mask("99.999-999");
		
		// seta o placeholder do complemento
		$("#EnderecoComplemento").focus(function(){
			$(this).attr("placeholder", "");	
		}).blur(function(){
			$(this).attr("placeholder", "Ex: apto 101");
		});
		
	});