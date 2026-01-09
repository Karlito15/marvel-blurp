<?php

namespace KarlitoWeb\Blurp\Trait;

use Symfony\Contracts\Translation\TranslatorInterface;

trait ControllerTrait
{
    public function __construct(
        private readonly TranslatorInterface $translator
    ) {
    }

    /**
     * @param string $directory
     * @return string
     */
    private function getDirectory(string $directory = 'yaml'): string
    {
        return realpath($this->getParameter('folders')[$directory]);
    }
}
