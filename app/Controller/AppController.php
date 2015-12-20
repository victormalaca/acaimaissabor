<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


	public $components = array(
		'Session',
		'Auth' => array(
				'loginRedirect' => array('controller' => 'Clientes', 'action' => 'pesquisar'),
				'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
				'loginAction' => array('controller' => 'Users', 'action' => 'login')
		)
	);



	/**
	 * Metodo para gerenciar o Paginate via DataTable
	 * @param $model: model corrente a consultar
	 * @param $config: condicoes de find
	 */
	function getData($model, $config = array()){

		if(empty($config['fields'])){
			$config['fields'] = $model->_schema;
		}
		if($this->params['url']['sSearch'] != ''){
			$config['conditions']['OR'] = array();
			foreach($config['fields'] as $nome => $valor){
				/* Para permitir filtrar ( clausula WHERE) por campos com funções como SUM, COUNT, CONCAT nos fields */
				if( count(explode(" as ",$valor))  > 1 ) {
					$valor = explode(" as ",$valor);
					$valor = trim( $valor[0] );
				}
				array_push($config['conditions']['OR'], array($valor." LIKE" => "%".$this->params['url']['sSearch']."%"));
			}
		}
		if(empty($config['conditions'])){
			$config['conditions'] = '1=1';
		}

		$totalRegistros =  $model->find('count', $config);

		$campoOrderBy = $config['fields'][$this->params['url']['iSortCol_0']];
		/* Para permitir ordenar por campos com funções como SUM, COUNT, CONCAT nos fields */
		if( count(explode(" as ",$campoOrderBy))  > 1 ) {
			$campoOrderBy = explode(" as ",$campoOrderBy);
			$campoOrderBy = trim( $campoOrderBy[1] );
		}
		$config['order'] = $campoOrderBy.' '.$this->params['url']['sSortDir_0'];
		$config['limit'] = $this->params['url']['iDisplayLength'];
		$config['offset'] = $this->params['url']['iDisplayStart'];
		$this->paginate = $config;
		$resultado = $this->paginate($model->name);

		$outPut = array(
				"sEcho" => intval($this->params['url']['sEcho']),
				"iTotalRecords" => $totalRegistros,
				"iTotalDisplayRecords" => $totalRegistros,//intval($this->params['url']['iDisplayLength']),
				"aaData" => array(),
		);

		foreach($resultado as $linha) {
			$registros = array();
			foreach ($config['fields'] as $field){
				$valor = "";
				/* pegar resulatado na estrutura $linha['Model']['campo'] */
				$modelCampo = explode(".",$field);

				if( count( $modelCampo ) == 2 ){
					$valor = $linha[ $modelCampo[0] ][ $modelCampo[1] ];
				} else {
					/* pegar resultado na estrutura $linha[ 0 ]['campo'].
					 * Para funçoes como SUM, COUNT, CONCAT nos fields */
					$modelCampo = explode(" as ",$field);
					$valor = $linha[ 0 ][ trim( $modelCampo[1] ) ];
				}

				array_push( $registros, $valor );
			}
			array_push($outPut['aaData'], $registros);
		}

		return $outPut;
	}
}
