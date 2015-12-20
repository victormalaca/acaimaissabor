<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Endereco $Endereco
 */
class Cliente extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'cliente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	/**
	 * CALLBACK AFTER SAVE
	 * para tratar o telefone deixando apenas numeros
	 */
	public function beforeSave($options = array()) {
		$this->data['Cliente']['fone_celular'] = preg_replace("/[^0-9]/", "", $this->data['Cliente']['fone_celular']);
		$this->data['Cliente']['fone_fixo'] = preg_replace("/[^0-9]/", "", $this->data['Cliente']['fone_fixo']);
		$this->data['Cliente']['fone_comercial'] = preg_replace("/[^0-9]/", "", $this->data['Cliente']['fone_comercial']);
	}


	/**
	 * CALLBACK AFTER SAVE
	 * para tratar o telefone deixando apenas numeros
	 */
	public function afterFind( $results, $primary = false ) {

		$this->formatarTelefones($results, array('Cliente.fone_celular', 'Cliente.fone_fixo', 'Cliente.fone_comercial'));

		return $results;
	}
}
