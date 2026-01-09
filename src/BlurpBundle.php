<?php

namespace KarlitoWeb\Blurp;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BlurpBundle
 *
 * @package KarlitoWeb\Blurp\src\
 */
class BlurpBundle extends Bundle
{
    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return parent::getNamespace();
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
