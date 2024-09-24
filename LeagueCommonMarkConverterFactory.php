<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twig\Extra\TwigExtraBundle;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Extension\ExtensionInterface;

/**
 * @internal
 */
final class LeagueCommonMarkConverterFactory
{
    private $extensions;
    private $converterConfig;

    /**
     * @param ExtensionInterface[] $extensions
     */
    public function __construct(iterable $extensions, array $converterConfig = [])
    {
        $this->extensions = $extensions;
        $this->converterConfig = $converterConfig;
    }

    public function __invoke(): CommonMarkConverter
    {
        $converter = new CommonMarkConverter($this->converterConfig);

        foreach ($this->extensions as $extension) {
            $converter->getEnvironment()->addExtension($extension);
        }

        return $converter;
    }
}
