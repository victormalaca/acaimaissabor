<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	/**
	 *
	 * Enter description here ...
	 * @param array $results: retorno de resultados do banco
	 * @param array: campos a formatar. Ex. array('Funcionario.datanasc')
	 */
	public function formatarTelefones( &$results, $camposAFormatar ) {

		/* passa por cada resultado */
		foreach ($results as $key => $val) {

			/* passa por cada campo date a formatar */
			foreach ($camposAFormatar as $modelCampo) {

				/* pega model e o campo a ser formatado */
				$modelCampo = explode('.', $modelCampo);
				if( count($modelCampo) != 2 ){
					continue;
				}
				$model = $modelCampo[0];
				$campo = $modelCampo[1];

				/* formata telefone deixando so os numeros */
				if (isset($val[ $model ][ $campo ]) && (strlen($val[ $model ][ $campo ]) == 10)) {

					$results[$key][ $model ][ $campo ] = "(";
					$results[$key][ $model ][ $campo ] .= substr($val[ $model ][ $campo ], 0, 2);
					$results[$key][ $model ][ $campo ] .= ") ";
					$results[$key][ $model ][ $campo ] .= substr($val[ $model ][ $campo ], 2, 4);
					$results[$key][ $model ][ $campo ] .= "-";
					$results[$key][ $model ][ $campo ] .= substr($val[ $model ][ $campo ], 6, 4);

				}
			}
		}
	}



}
