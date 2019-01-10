<?php declare(strict_types = 1);

namespace WebChemistry\Decorator;

use Nette\DI\Definitions\Definition;
use Nette\DI\Definitions\Reference;
use Nette\DI\Statement;
use Nette\Utils\Arrays;

final class DecorateDefinition {

	/** @var Definition[] */
	private $definitions;

	public function __construct(array $definitions) {
		$this->definitions = $definitions;
	}

	/**
	 * @param string|array|Definition|Reference|Statement $entity
	 * @param array $args
	 * @return static
	 */
	public function addSetup($entity, array $args = []) {
		foreach ($this->definitions as $definition) {
			$definition->addSetup($entity, $args);
		}

		return $this;
	}

	/**
	 * @param array $tags
	 * @return static
	 */
	public function addTags(array $tags) {
		$tags = Arrays::normalize($tags, true);
		foreach ($this->definitions as $definition) {
			$definition->setTags($definition->getTags() + $tags);
		}

		return $this;
	}

}
