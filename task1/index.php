<?php
require_once(__DIR__ . './Classes/Calculator.php');
require_once(__DIR__ . './Classes/InputFilter.php');

$operation = $argv[1] ?? ''; // Get User Input
$userInput = $argv[2] ?? 0; // Get User Input

Class Test1 {
	/**
	 * User Input
	 */
	private $input;
	/**
	 * User Input
	 */
	private $operation;

	public function __construct($operation, $arg){
		$this->input = $arg;
		$this->operation = $operation;
		$this->inputFilter = new InputFilter();
		$this->calculator = new Calculator();
		$this->getSum();
	}

	/**
	 * Get Sum of user inputs
	 * @return Throws an error if not valid input format else prints the sum of input
	 */
	public function getSum(){
		try {

			$isValid = $this->inputFilter->validate($this->input);
			if(!$isValid){
				throw new Exception($this->inputFilter->getError());
			}

			if(!method_exists('Calculator', $this->operation)){
				throw new Exception('Calculator method does not exists. Possible operations: ' . ucwords(implode(get_class_methods ('Calculator'), ', ')));
			}

			$values = $this->inputFilter->getValues();
			$sum = Calculator::{$this->operation}($values);
			echo $sum;
		} catch (Exception $e){
			echo $e->getMessage();
		}

	}

}


$test1 = new Test1($operation, $userInput);
