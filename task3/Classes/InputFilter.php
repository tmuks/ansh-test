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
	 * @param array $glue Separators array, default ',' and '\n'
	 * @return boolean Returns true if valid else false.
	 */
	public function validate($arg, $glue = [',', '\n']){
		foreach ($glue as $key => $value){
			$glueQuoted[] = preg_quote($value);
		}
		$separators = implode($glueQuoted, '|');
		$regex = '~([0-9]+(('.$separators.')[0-9]+)*)$~';

		try {

			if(empty($arg)){
				$this->values = [0];
			} else if(preg_match($regex, $arg)){
				$this->values = preg_split("~$separators~", $arg);
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