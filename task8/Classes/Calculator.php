<?php
class Calculator {
	public function __construct(){

	}

	/**
	 * Get product of values
	 */
	public static function multiply($values) {
		return array_product($values);
	}
}