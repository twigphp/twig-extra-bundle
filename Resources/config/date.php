<?php

/*
 * This file is part of Twig.
 *
 * (c) Stéphane Férey
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Twig\Extra\Date\DateExtension;

return static function (ContainerConfigurator $container) {
    $container->services()
        ->set('twig.extension.date', DateExtension::class)
            ->tag('twig.extension')
    ;
};
