<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {

		$this->Auth->allow('login', 'logout');

		if ( ($this->Auth->user('group_id') != 1) && ( ($this->action != 'login') && ($this->action != 'logout') ) )  {
			return $this->redirect(array('controller' => 'Clientes', 'action' => 'pesquisar'));
		}

		$this->Session->delete('Message.auth');

		parent::beforeFilter();
	}

	public function login() {
		$this->layout = "layout_login";

		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash("Usuário não autenticado. Tente novamente!", "flash_error");
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		return $this->redirect(array('action' => 'pesquisar'));
	}

	public function pesquisar() {
	}

	public function listagemJson($filtroId = null) {
		$this->autoRender = false;
		$condicoes = array();

		$output = $this->GetData(
				$this->User,	array(
						'fields' => array(
								'User.id',
								'User.nome',
								'User.username',
								'Group.name',
						),
						'conditions' => $condicoes,
						'joins' => array(
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Dados do usuário salvos com sucesso.', 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Os dados do usuário não poderam ser salvos. Por favor, tente novamente.', 'flash_error');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Dados do usuário atualizados com sucesso.', 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Os dados do usuário não poderam ser atualizados. Por favor, tente novamente.', 'flash_error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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

		$this->User->id = $id;
		if (!$this->User->exists()) {
			//Monta array de retorno Json
			$retorno = array ( 'status' => false, 'mensagem' => 'Usuário informado não encontrado.', 'resposta' => '' );
			return json_encode($retorno);
		}
		$this->request->onlyAllow('post', 'delete');

		if ( $this->User->delete() ) {
			//Monta array de retorno Json
			$retorno = array ( 'status' => true, 'mensagem' => 'Dados do usuário excluídos com sucesso.', 'resposta' => '' );
			return json_encode($retorno);
		} else {
			//Monta array de retorno Json
			$retorno = array ( 'status' => false, 'mensagem' => 'Os dados do usuário não poderam ser excluídos. Por favor, tente novamente.', 'resposta' => '' );
			return json_encode($retorno);
		}
		return $this->redirect(array('action' => 'index'));
	}


}
