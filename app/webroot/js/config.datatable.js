

/**
 * @descricao: Arquivo para configurações comuns a todo o projeto
 */

/*********************************************************************************
 * Metodo para recuperar a UrlBase do Projeto (Ex http://localhost/gpds)
 *********************************************************************************/
function getBaseURL() {
	var baseURL = $("#urlBase").val();
	if (baseURL.substr(-1,1) != "/") {
		baseURL += "/";
	}
    return baseURL;
}



$(document).ready(function() {
	/**
	 * JavaScript para comportamentos gerais do sistemas
	 */

	
	var oTable = $(".dynamicTable").each( function(){
		
		var url = "";
		var idDataTable = $(this).attr("id");
		
		/*********************************************************************************
		 * define se a ListagemJson (datatable) terá ou nao conditions no find
		 *********************************************************************************/
		if( $('#idRegistro').val() ) {
			url = getBaseURL() +  $(this).attr("controller") + "/listagemJson/" +  $('#idRegistro').val();
		} else {
			url = getBaseURL() +  $(this).attr("controller") + "/listagemJson";
		}
		
		/*********************************************************************************
		 * define parâmetros de configurações do dataTable
		 *********************************************************************************/
		var configDataTable = {	
				"bProcessing": false,
		        "bServerSide": true,
		        "sAjaxSource": url,
		        "fnServerParams": function ( aoData ) {
					aoData.push( { "name": "controller", "value": $("#controller").val() },
								 { "name": "controllerParent", "value": $("#controllerParent").val() } );
        		},
		        //"sPaginationType": "two_button",
		        //"sPaginationType": "full_numbers",
		        "sPaginationType": "bootstrap",
		        "iDisplayLength": 10,
				"bJQueryUI": false,
				"bAutoWidth": false,
				"bLengthChange": false,
				"aaSorting": [[ 0, "desc" ]],
				"sDom": '<"H"Tfr>t<"F"ip>',
				"oLanguage": {
					"sSearch": "Pesquisar:",
					"sProcessing":   "Processando...",
					"sLengthMenu":   "Mostrar _MENU_ registros",
					"sZeroRecords":  "Não foram encontrados resultados",
					"sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
					"sInfoFiltered": "(filtrado de _MAX_ registros no total)",
					"sInfoPostFix":  "",
					"sUrl":          "",
					"oPaginate": {
					"sFirst":    "Primeiro",
					"sPrevious": "Anterior",
					"sNext":     "Seguinte",
					"sLast":     "Último"
					}
			    },
					
				"oTableTools": {
					"sSwfPath": "../gpds/webroot/css/datatable/copy_csv_xls_pdf.swf",
					"aButtons":    [ 
						{"sExtends": "csv","sToolTip": "Salvar como CSV"},
		                {"sExtends": "xls","sToolTip": "Salvar como XLS"},
						{"sExtends": "pdf","sToolTip": "Salvar como PDF"},
						{"sExtends": "copy","sToolTip": "Copiar Registros"}
					]
				},
				"fnDrawCallback": function( oSettings ) {					
					// muda o foco para o botão de pesquisa
					//$(".dataTables_filter :input").first().focus();
				}
				
			};
		
	
		/***********************************************************************************
		 * Verifica se o atributo ACOES do dataTable foi definido na View
		 ************************************************************************************/
		if( $(this).attr("acoes") ) {
			//Verifica se o atributo COLUNAS do dataTable foi definido na View
			if ( $(this).attr("colunas") ) {
				//Verifica se foi definida algum tipo de ação para gerar botões no dataTable
				if( $.trim( $(this).attr("acoes") ) != "" ) {
					var numeroColunas = $(this).attr("colunas");
					var acoes = $(this).attr("acoes").split(",");
					var colunas = new Array();
					var botoes = "";
					
					//Define operações da coluna Ações
					if ( $.inArray("print", acoes) != -1 ) {
						href =  $(this).attr("controller")+'/imprimir/';
						botoes += ' <a href="#" url="' + href + '" class="btn btn-info btn-acao" title="Imprimir" ><i class="icon-print icon-white"></i></a> ';
					}
					if ( $.inArray("view", acoes) != -1 ) {
						href =  $(this).attr("controller")+'/view/';
						botoes += ' <a href="#" url="' + href + '" class="btn btn-success btn-acao" title="Visualizar"><i class="icon-zoom-in icon-white"></i></a> ';
					}
					if ( $.inArray("edit", acoes) != -1 ) {
						href =  $(this).attr("controller")+'/edit/';
						botoes += ' <a href="#" url="' + href + '" class="btn btn-primary btn-acao" title="Editar"><i class="icon-edit icon-white"></i></a> ';
					}
					if ( $.inArray("delete", acoes) != -1 ) {
						href =  $(this).attr("controller")+'/delete/';
						botoes += ' <a href="#" url="' + href + '" class="btn btn-danger btn-acao" title="Excluir" ><i class="icon-trash icon-white"></i></a> ';
					}					
					if ( $.inArray("add", acoes) != -1 ) {
						//Verifica se existe atributo Child, caso exista e seja diferente de branco, monta botão Add apontando para controller informado no atributo Child
						if( $(this).attr("child") && $.trim( $(this).attr("child") ) != "" ) {
							href =  $(this).attr("child")+'/add/';
							// trata caso especifico das Atividades q podem ser add a partir da Demanda ou de outra Atividade
							if( ( $(this).attr("controller").toUpperCase() == "DEMANDAS") || ( $(this).attr("controller").toUpperCase() == "ATIVIDADES") ) {
								href =  $(this).attr("child")+'/add/' + $(this).attr("controller") + '/';
							}
							botoes += ' <a href="#" url="' + href + '" class="btn btn-info btn-acao" title="Adicionar ' + $(this).attr("child") + '" ><i class="icon-plus icon-white"></i></a> ';
						} else {
							href =  $(this).attr("controller")+'/add/';
							botoes += ' <a href="#" url="' + href + '" class="btn btn-info btn-acao" title="Adicionar"><i class="icon-plus icon-white"></i></a> ';
						}
					}
					
					//Define as colunas anteriores a coluna Ações
					for(i=0; i < (numeroColunas-1);i++) {
						colunas[i] =  {"mData": null};
					}
					
					//Define configurações da coluna Ações
					colunas[ numeroColunas - 1 ] = {
						"mData": "Ações",
						"sClass": "center",
						"sDefaultContent": botoes,
					};
					
					//define parâmetro de configuração do dataTable para exibir coluna Ações
					configDataTable["aoColumns"] = colunas;

					/*********************************************************************************
					 * define procedimentos que sera excutado após montagem do dataTable
					 *********************************************************************************/
					configDataTable["fnDrawCallback"] = function( oSettings ) {
						
						// muda o foco para o botão de pesquisa
						//$(".dataTables_filter :input").first().focus();
						
						// deixa sempre os botoes de ações sempre em linha
						if( $(this).attr("acoes") ){
							$(this).find('tr td:last-child').attr('nowrap', 'nowrap');
						}							
						
						/*********************************************************************************
						 * Dispara o on-click dos botões da coluna Ações
						 *********************************************************************************/
						$('.btn-acao').click(function(){
							
							//Obtem o ID(do banco) do registro clicado
			                var idRegistro = $(this).parents('tr').children('td:first-child').text();

			                //Busca URL do registro
			                var urlAction = getBaseURL() + $(this).attr('url');
							
			                /*********************************************************************************
							 * Verifica se o botao é Excluir para pedir confirmação
							 *********************************************************************************/
							if( $(this).hasClass('btn-danger') ) {
								
								// configura o dialog (caixa de mensagem)
								$( "#dialog-ui" ).dialog({
									resizable: false,
								    height:140,
								    modal: true,
								    title: 'Aviso!',
								    closeOnEscape: true,
								    buttons: {
								    	"Sim": function() {
											$( this ).dialog( "close" );						
									        $.ajax({
									        	type: "POST",
									            url: urlAction + idRegistro,
									    		data: null,
									    		dataType: 'json',
									            success: function(retorno) {
									        		if(retorno.status == true) {
									        			//Exibe mensagem de sucesso
									        			show_stack_bar_top("success",retorno.mensagem);
									        			$("#"+idDataTable).dataTable().fnDraw();
									        		} else {
									        			//Exibe mensagem de alerta
									        			show_stack_bar_top("notice",retorno.mensagem);
									        		}
									            },
									        	error: function(erro) {
									            	//Exibe mensagem de erro
									            	show_stack_bar_top("error","Não foi possível excluir registro selecionado.");
									            },
									    		complete: function(resposta) {	
									    		}
									        });
								      	},
								      	"Não": function() {
								      		$( this ).dialog( "close" );
								        }
									}
								});
								// exibe o dialog (caixa de mensagem)
								$( "#content-dialog" ).html('Deseja realmente excluir o registro?');
								$( "#dialog-ui" ).dialog( "open" );
								return false;
							}
							
							/*********************************************************************************
							 * Verifica se o botao é Print pra mandar imprimir o registro
							 *********************************************************************************/
							if( $(this).hasClass('btn-info') ) {
								//show_stack_bar_top("success","Impressão solicitada, favor aguardar o término...");
								
								 $.ajax({
						        	type: "POST",
						            url: urlAction + idRegistro,
						    		data: null,
						    		dataType: 'json',
						            success: function(retorno) {
						        		if(retorno.status == true) {
						        			//Exibe mensagem de sucesso
						        			show_stack_bar_top("success",retorno.mensagem);
						        			$("#"+idDataTable).dataTable().fnDraw();
						        		} else {
						        			//Exibe mensagem de alerta
						        			show_stack_bar_top("notice",retorno.mensagem);
						        		}
						            },
						        	error: function(erro) {
						            	//Exibe mensagem de erro
						            	show_stack_bar_top("error","Não foi possível imprimir registro solicitado.");
						            },
						    		complete: function(resposta) {	
						    		}
						        });
								
								
								return false;
							}
			                
			                //Redireciona para URL do registro selecionado
			                window.location.assign( urlAction + idRegistro );
						});

						/*********************************************************************************
						 * ativa o ToolTip para a Listagem de Gestores
						 *********************************************************************************/
						if($(this).attr("controller") == "Gestores") {
							$('tbody tr').each( function() {
								
								//Obtem o ID(do banco) do registro clicado
				                var idRegistro = $(this).children('td:first-child').text();
				                var textoTooltip = '';
				                
				                //Chamada Ajax para buscar dados do resumo
				                $.ajax({
				                	async: false,
				                	type: "POST",
				                    url: getBaseURL() +  'Gestores/calculaResumo/' + idRegistro,
				            		data: null,
				            		dataType: 'json',
				                    success: function(retorno) {				                						                					                		
				                		textoTooltip =  '<strong>' + retorno.resposta.totalContratos + '</strong> contrato(s) <br />';
				                		textoTooltip += '<strong>' + retorno.resposta.totalDemandas + '</strong> demanda(s) <br />';
				                		textoTooltip += '<strong>' + retorno.resposta.totalAtividades + '</strong> atividade(s)'; 
				                    },
				                	error: function(erro) {
				                    },
				            		complete: function(resposta) {	
				            		}
				                });
				                
				                //Exibe dados formato ToolTip
								$(this).attr( 'title',textoTooltip);
								$(this).tooltip();
								
								//Exibe dados formato PopOver
								/*$(this).attr( 'title', 'Resumo' );
								$(this).attr( 'data-content','<strong>Contratos: </strong>0<br /><strong>Demandas: </strong> 4 <br /><strong>Atividades: </strong> 7' );
								$(this).attr( 'data-rel', 'popover' );
								$(this).popover({placement:"top"});*/								
						    } );
						}
						
						//Exibe o tooltip para todos os botões da coluna ações
						$(".btn-acao").tooltip();
					}
				}
				
			} else { //Caso atributo Colunas não tenha sido definido
				alert("Favor definir atributo Colunas do dataTable");
			}
		}
		
		/*********************************************************************************
		 * ativa o DataTable
		 *********************************************************************************/
		$(this).dataTable( configDataTable );
		
	});

});