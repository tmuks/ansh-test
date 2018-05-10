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

	public function __construct(){

	}

	/**
	 * Check if input argument are properly validated or not. If valid will be stored in $values.
	 * @param string $arg Input data
	 * @return boolean Returns true if valid else false.
	 */
	public function validate($arg){
		$regex = '~^\\\\\\\\(.+=?)\\\\\\\\(\-?\d+(\1\-?\d+)*)$~';

		try {

			if(empty($arg)){
				$this->values = [0];
			} else if(preg_match($regex, $arg, $matches)){
				$values = explode($matches[1], $arg);
				$invalidList = array_filter($values, function ($v) {
					return $v < 0;
				});
				if(!empty($invalidList)){
					throw new Exception("Error: Negative numbers (". implode(', ',$invalidList).") not allowed.");
				}
				$this->values = $values;
			} else {
				throw new Exception("\n========================================\nInvalid Input Data. Please try again! \n\nPossible input \\\\;\\\\4;5.	\n\n========================================\n");
			}
			return true;
		}catch(Exception $e) {
			$this->error = $e->getMessage();
			return false;
		}

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