<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Cliente', 'Endereco');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		return $this->redirect(array('action' => 'pesquisar'));
	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function pesquisar() {
		// seta as acoes que cada grupo de usuário logado pode executar
		$lGroups = array(
				'1' => array('nome' => 'Administradores', 'acoes' => 'print,view,edit,delete'),
				'2' => array('nome' => 'Atendentes', 'acoes' => 'print,view,edit')
		);
		$IdGroupUserLogado = $this->Auth->user('Group.id');
		$acoesUserLogado = $lGroups[ $IdGroupUserLogado ]['acoes'];
		$this->set('acoes', $acoesUserLogado );
	}

	public function listagemJson($filtroId = null) {
		$this->autoRender = false;
		$condicoes = array();

		$output = $this->GetData(
				$this->Cliente,	array(
						'fields' => array(
								'Cliente.id',
								'Cliente.nome',
								'Cliente.apelido',
								'Cliente.fone_celular',
								'Cliente.fone_fixo',
								'Endereco.rua',
								'Endereco.bairro',
						),
						'conditions' => $condicoes,
						'joins' => array(
							array(
								'table' => 'Enderecos',
								'alias' => 'Endereco',
								'type' => 'LEFT',
								'conditions'=> array('Endereco.cliente_id = Cliente.id')
							),
						),
				)
		);
		echo json_encode($output);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}

		$optionsCliente = array('conditions' => array('Cliente.id' => $id));
		$dadosCliente = $this->Cliente->find('first', $optionsCliente);
		$optionsEndereco = array('conditions' => array('Endereco.cliente_id' => $id));
		$dadosEndereco = $this->Endereco->find('first', $optionsEndereco);

		$this->set('cliente', array_merge( $dadosCliente, $dadosEndereco ) );
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$this->Cliente->create();
			if ( $this->Cliente->save($this->request->data['Cliente']) ) {

				$this->request->data['Endereco']['cliente_id'] = $this->Cliente->getLastInsertID();
				$this->request->data['Endereco']['cidade_id'] = 1; //@todo: validar com cliente necessidade

				if ( $this->Endereco->save($this->request->data['Endereco']) ) {
					$this->Session->setFlash('Dados do cliente salvos com sucesso.', 'flash_success');
					return $this->redirect(array('action' => 'index'));
				}

			} else {
				$this->Session->setFlash('Os dados do cliente não poderam ser salvos. Por favor, tente novamente.', 'flash_error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {

			//prd($this->request->data);

			if ( $this->Cliente->save($this->request->data['Cliente']) ) {

				if ( $this->Endereco->save($this->request->data['Endereco']) ) {
					$this->Session->setFlash('Dados do cliente atualizados com sucesso.', 'flash_success');
					return $this->redirect(array('action' => 'index'));
				}

			} else {
				$this->Session->setFlash('Os dados do cliente não poderam ser atualizados. Por favor, tente novamente.', 'flash_error');
			}

		} else {
			$optionsCliente = array('conditions' => array('Cliente.id' => $id));
			$dadosCliente = $this->Cliente->find('first', $optionsCliente);
			$optionsEndereco = array('conditions' => array('Endereco.cliente_id' => $id));
			$dadosEndereco = $this->Endereco->find('first', $optionsEndereco);

			$this->request->data = array_merge( $dadosCliente, $dadosEndereco );
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->autoRender = false;

		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			//Monta array de retorno Json
			$retorno = array ( 'status' => false, 'mensagem' => 'Cliente informado não encontrado.', 'resposta' => '' );
			return json_encode($retorno);
		}
		$this->request->onlyAllow('post', 'delete');

		if( $this->Endereco->deleteAll( array('Endereco.cliente_id' => $id) ) ) {
			if ( $this->Cliente->delete() ) {
				//Monta array de retorno Json
				$retorno = array ( 'status' => true, 'mensagem' => 'Dados do cliente excluídos com sucesso.', 'resposta' => '' );
				return json_encode($retorno);
			}
		} else {
			//Monta array de retorno Json
			$retorno = array ( 'status' => false, 'mensagem' => 'Os dados do cliente não poderam ser excluídos. Por favor, tente novamente.', 'resposta' => '' );
			return json_encode($retorno);
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * print method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function imprimir($id = null) {
		$this->autoRender = false;
		$this->layout = 'json';

		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			//Monta array de retorno Json
			$retorno = array ( 'status' => false, 'mensagem' => 'Cliente informado não encontrado.', 'resposta' => '' );
			return json_encode($retorno);
		}
		$this->request->onlyAllow('post', 'delete');


		$dadosCliente = $this->Cliente->read(null, $id);

		/* monta a string a imprimir */
		$stringImprimir  = "\n\n\n\n\n\n";
		$stringImprimir .= "------------ PEDIDO (1a VIA) -------------\n";
		$stringImprimir .= "Nome: {$dadosCliente['Cliente']['nome']} \n";
		$stringImprimir .= "Apelido: {$dadosCliente['Cliente']['apelido']} \n";
		$stringImprimir .= "Endereco: {$dadosCliente['Endereco'][0]['rua']}, {$dadosCliente['Endereco'][0]['numero']}, {$dadosCliente['Endereco'][0]['complemento']} \n";
		$stringImprimir .= "Bairro: {$dadosCliente['Endereco'][0]['bairro']} \n";
		$stringImprimir .= "Celular: {$dadosCliente['Cliente']['fone_celular']} \n";
		$stringImprimir .= "Fixo: {$dadosCliente['Cliente']['fone_fixo']} \n";
		$stringImprimir .= "Comercial: {$dadosCliente['Cliente']['fone_comercial']} \n";
		$stringImprimir .= "Obs: {$dadosCliente['Endereco'][0]['observacao']} \n";
		
		$stringImprimir .= "\n\n\n\n\n\n\n\n\n\n";
		$stringImprimir .= "------------ PEDIDO (2a VIA) -------------\n";
		$stringImprimir .= "Nome: {$dadosCliente['Cliente']['nome']} \n";
		$stringImprimir .= "Apelido: {$dadosCliente['Cliente']['apelido']} \n";
		$stringImprimir .= "Endereco: {$dadosCliente['Endereco'][0]['rua']}, {$dadosCliente['Endereco'][0]['numero']}, {$dadosCliente['Endereco'][0]['complemento']} \n";
		$stringImprimir .= "Bairro: {$dadosCliente['Endereco'][0]['bairro']} \n";
		$stringImprimir .= "Celular: {$dadosCliente['Cliente']['fone_celular']} \n";
		$stringImprimir .= "Fixo: {$dadosCliente['Cliente']['fone_fixo']} \n";
		$stringImprimir .= "Comercial: {$dadosCliente['Cliente']['fone_comercial']} \n";
		$stringImprimir .= "Obs: {$dadosCliente['Endereco'][0]['observacao']} \n";

		/* tratamento da string: remove a acentuação e coloca tudo em maiuscula */
		$stringImprimir = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $stringImprimir ) );
		$stringImprimir = strtoupper($stringImprimir);

		/*************************************************
			IMPRIMIR DIRETO DO PHP
		 *************************************************/
		$handle = printer_open("Cozinha");//tipo de impressora configurada no windows
		printer_write($handle, "$stringImprimir");//imprimir as variáveis \n para nova linha
		printer_close($handle);//fechando a impressora utilizada


		$retorno = array ( 'status' => true, 'mensagem' => 'Impressão solicitada, favor aguardar o término...', 'resposta' => '' );
		return json_encode($retorno);
	}

}
