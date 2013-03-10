<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Formable Interface
 * @author davidf
 *
 */
interface Interface_Kohana_Formable {

	public function labels();
	public function filters();
	public function rules();
}
