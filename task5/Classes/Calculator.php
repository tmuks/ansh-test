<?php
class Calculator {
	public function __construct(){

	}

	/**
	 * Get sum of values
	 */
	public static function add($values) {
		return array_sum($values);
	}
}