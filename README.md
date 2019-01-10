## Nette decorator in CompilerExtension

Usage:

```php

use Nette\DI\CompilerExtension;
use WebChemistry\Decorator\Decorator;

class CustomExtension extends CompilerExtension {

	public function beforeCompile() {
    		$decorator = new Decorator($this->getContainerBuilder());
    
			$decorator->decorate(BaseGrid::class)
				->addSetup('injectComponents')
				->addTags(['tag']);
	}

}

```