<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Formable Field
 * @author davidf
 *
 */
class Kohana_Formable_Field {

	/**
	* @var Object Request Payload
	*/
	protected $field_name = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $field_type = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $field_value_id = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $field_value_name = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $field_value_depth = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $_field_values = NULL;

	/**
	 * Creates a new Formable Field object.
	 *
	 * @param   array  configuration
	 * @return  void
	 */
	public function __construct($field_name, $field_type, $field_value_id, $field_value_name, $field_value_depth, $field_values)
	{
		$this->field_name = $field_name;
		$this->field_type = $field_type;
		$this->field_value_id = $field_value_id;
		$this->field_value_name = $field_value_name;
		$this->field_value_depth = $field_value_depth;
		$this->_field_values = $field_values;
	}

	public function field_values() {
		return $this->_field_values;
	}

	public function setFieldValues($values) {
		$this->_field_values = $values;
	}

	public function as_array() {
		return array(
			'field_name'		=>$this->field_name,
			'field_id'			=>$this->field_id,
			'field_value_id'	=>$this->field_value_id,
			'field_value_name'	=>$this->field_value_name,
			'field_value_depth'	=>$this->field_value_depth,
			'field_values'		=>$this->_field_values,
		);
	}
}