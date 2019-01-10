<?php declare(strict_types = 1);

namespace WebChemistry\Decorator;

use Nette\DI\ContainerBuilder;
use Nette\DI\Definitions\Definition;
use Nette\DI\Definitions\FactoryDefinition;

final class Decorator {

	/** @var ContainerBuilder */
	private $builder;

	public function __construct(ContainerBuilder $builder) {
		$this->builder = $builder;
	}

	public function decorate(string $type): DecorateDefinition {
		if (!class_exists($type)) {
			throw new ClassNotExistsException($type);
		}

		return new DecorateDefinition($this->findByType($type));
	}

	private function findByType(string $type): array {
		return array_filter($this->builder->getDefinitions(), function (Definition $def) use ($type): bool {
			return is_a($def->getType(), $type, true)
				|| ($def instanceof FactoryDefinition && is_a($def->getResultType(), $type, true));
		});
	}

}
