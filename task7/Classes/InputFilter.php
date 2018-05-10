<?php
class InputFilter {
	/**
	 * Input Values
	 */
	private $values = [];

	/**
	 * Input Error
	 */
	private $error = null;

	/**
	 * Max Input Values
	 */
	private $maxValue = 1000;

	public function __construct(){

	}

	/**
	 * Check if input argument are properly validated or not. If valid will be stored in $values.
	 * @param string $arg Input data
	 * @return boolean Returns true if valid else false.
	 */
	public function validate($arg){
		$regex = '~^\d+(\,\d+)*$~';

		try {

			if(empty($arg)){
				$this->values = [0];
			} else if(preg_match($regex, $arg)){
				$values = explode(',', $arg);

				$this->values = $this->_getAllowedValues($values);
			} else {
				throw new Exception("\n========================================\nInvalid Input Data. Please try again! \n\nPossible input 4,5.	\n\n========================================\n");
			}
			return true;
		}catch(Exception $e) {
			$this->error = $e->getMessage();
			return false;
		}

	}

    /**
     * Get all the allowed values less than the max value
     * @param array $values List of array values
     * @return Valid filtered input arrray
     */
	private function _getAllowedValues($values){
		$maxValue = $this->maxValue;
		$allowedValues = array_filter($values, function ($v) use ($maxValue) {
			return $v <= $maxValue;
		});
		return $allowedValues;
	}

    /**
     * @return Input Error
     */
	public function getError(){
		return $this->error;
	}

    /**
     * @return Array of Input Value
     */
	public function getValues(){
		return $this->values;
	}

}
