<?php
class InputFilter {
	/**
	 * Input Values
	 */
	private $values = [];

	/**
	 * Input Values
	 */
	private $error = null;

	public function __construct(){

	}

	/**
	 * Check if input argument are properly validated or not. If valid will be stored in $values.
	 * @param string $arg Input data
	 * @return boolean Returns true if valid else false.
	 */
	public function validate($arg, $glue = ','){
		$regex = '|([0-9]+('.preg_quote($glue).'[0-9]+)*)$|';

		try {

			if(empty($arg)){
				$this->values = [0];
			} else if(preg_match($regex, $arg)){
				$this->values = explode($glue, $arg);
			} else {
				throw new Exception("\n========================================\nInvalid Input Data. Please try again! \n\nPossible input '' (empty) or comma separated number.	\n\n========================================\n");
			}
			return true;
		}catch(Exception $e) {
			$this->error = $e->getMessage();
			return false;
		}

	}

	public function getError(){
		return $this->error;
	}

	public function getValues(){
		return $this->values;
	}

}