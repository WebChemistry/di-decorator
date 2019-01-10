<?php declare(strict_types = 1);

namespace WebChemistry\Decorator;

class ClassNotExistsException extends \RuntimeException {

	public function __construct(string $type) {
		parent::__construct("Class '$type' not exists.");
	}

}
