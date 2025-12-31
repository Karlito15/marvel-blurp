README.md

## Commons Files

### Services
``Blurp/Service/YAMLService``
``` php
self::ArrayToYaml(string $filepath, array $content, bool $regenerate = true);
```

``` php
self::YamlToArray(string $filepath, int $flags = 0);
```


### Traits
``Blurp/Trait/CommandTrait``
``` php
$this->configure();
```
``` php
$this->initialize(InputInterface $input, OutputInterface $output);
```
``` php
self::resume(SymfonyStyle $io, float $duration = 0.0);
```
``` php
self::table(array $headers, array $content, OutputInterface $output);
```

``Blurp/Trait/ControllerTrait``
``` php
$this->getDirectory(string $directory = 'yaml');
```
