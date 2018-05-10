<?php
require_once(__DIR__ . '/Classes/Calculator.php');
require_once(__DIR__ . '/Classes/InputFilter.php');

Class Test4 {
	/**
	 * User Input
	 */
	private $input;

	/**
	 * User Operation
	 */
	private $operation;

	public function __construct($operation, $arg){
		$this->input = $arg;
		$this->operation = $operation;
		$this->inputFilter = new InputFilter();
		//$this->calculator = new Calculator();
		$this->getSum();
	}

	/**
	 * Get Sum of user inputs
	 * @return Throws an error if not valid input format else prints the sum of input
	 */
	public function getSum(){
		try {

            // Validate User Input and Throw exception if invalid
			$isValid = $this->inputFilter->validate($this->input);
			if(!$isValid){
				throw new Exception($this->inputFilter->getError());
			}

            // Check if the operation is available or not
			if(!method_exists('Calculator', $this->operation)){
				throw new Exception('Calculator method does not exists. Possible operations: ' . ucwords(implode(get_class_methods ('Calculator'), ', ')));
			}

			$values = $this->inputFilter->getValues();          // Get Filtered Values
			$sum = Calculator::{$this->operation}($values);     // Calculator Operation
			echo $sum;
		} catch (Exception $e){
			echo $e->getMessage();
		}

	}

}

$operation = $argv[1] ?? ''; // Get User Operation
$userInput = addcslashes($argv[2], "\\") ?? 0; // Get User Input and escape the same

$test1 = new Test4($operation, $userInput);
