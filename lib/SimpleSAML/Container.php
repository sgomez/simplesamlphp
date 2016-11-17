<?php
/*
 * This file is part of the simplesamlphp.
 *
 * (c) Sergio Gómez <sergio@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SimpleSAML;


use Symfony\Component\DependencyInjection\ContainerBuilder;

class Container
{
    /**
     * @var ContainerBuilder
     */
    protected static $instance;

    /**
     * @return ContainerBuilder
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance =  new ContainerBuilder();
        }

        return static::$instance;
    }
}