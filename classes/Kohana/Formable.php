<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Formable Interface
 * @author davidf
 *
 */
class Kohana_Formable {

	// Merged configuration settings
	protected $_config = array(
		'access_key'    => '',
		'secret_key'   	=> '',
		'host'   		=> '',
		'verify_host'	=> '',
		'verify_peer'	=> '',
		'default_from'	=> '',
	);

	/**
	* @var Object Request Payload
	*/
	protected $action = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $method = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $id = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $name = NULL;

	/**
	* @var Object Request Payload
	*/
	protected $_fields = array();

	/**
	* @var Object Request Payload
	*/
	protected $_values = array();

	/**
	* @var Object Request Payload
	*/
	protected $_rules = array();

	/**
	 * Creates a new Formable object.
	 *
	 * @param   array  	configuration
	 * @return  object	Formable
	 */
	public static function factory($action = NULL, $method = NULL, $id = NULL, $name = NULL, $object = NULL)
	{
		return new Formable($action, $method, $id, $name, $object);
	}

	/**
	 * Creates a new Formable object.
	 *
	 * @param   array  configuration
	 * @return  void
	 */
	public function __construct($object = NULL, $name = NULL, $method = NULL, $action = NULL, $id = NULL)
	{
		$config = Kohana::$config->load('formable')->default;
		if($name != NULL)
			$this->name = $name;
		if($id != NULL)
			$this->id = $id;
		if($action != NULL)
			$this->action = $action;
		if($method != NULL)
			$this->method = $method;
		else
			$this->method = $config->method;
		if($object != NULL)
			$this->addObject($object);
	}


	public function form() {
		/*
		<xsl:param name="action" select="action"/>
		<xsl:param name="method" select="method"/>
		<xsl:param name="id" select="id">
		<xsl:param name="name" select="name">
		<xsl:param name="values"/>
		*/
	}

	public function addObject($object) {
		if(is_string($object))
			$object = ORM::factory($object);
		if($object instanceof Interface_Formable) {
			$this->_fields = $object->fields();
			if($object->loaded()){
				$this->_values = $object->as_array();
			}
			$this->_rules = $object->rules();
			if($this->name == NULL)
				$this->name = $this->object->object_name();
			if($this->id == NULL)
				$this->id = 'form_'.$this->name;
		}
	}

	public function setFields($fields) {
		$this->_fields = $fields;
	}

	public function fields() {
		return $this->_fields;
	}

	public function as_array() {
		return array(
			'action'=>$this->action,
			'method'=>$this->method,
			'id'=>$this->id,
			'name'=>$this->name,
			'values'=>$this->_values,
			'fields'=>$this->_fields,
			'rules'=>$this->_rules,
		);
	}
}