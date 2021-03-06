<?php
/**
 * Aura\Cli Provider for Aura\Di
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Config
 * @package   Fusible\CliProvider
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/fusible/fusible.cli-provider
 */

namespace Fusible\CliProvider;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Aura\Cli\CliFactory as Factory;
use Aura\Cli\Context\OptionFactory;
use Aura\Cli\Help;

/**
 * Config
 *
 * @category Config
 * @package  Fusible\CliProvider
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/2016 MIT License
 * @link     https://github.com/fusible/fusible.cli-provider
 *
 * @see ContainerConfig
 */
class Config extends ContainerConfig
{
    const GLOBALS = 'GLOBALS';

    const FACTORY = 'aura/cli:factory';
    const CONTEXT = 'aura/cli:context';
    const STDIO   = 'aura/cli:stdio';

    /**
     * Globals
     *
     * @var array
     *
     * @access protected
     */
    protected $globals;

    /**
     * __construct
     *
     * @param array $globals GLOBALS array
     *
     * @access public
     */
    public function __construct(array $globals = null)
    {
        $this->globals = (null === $globals) ? $GLOBALS : $globals;
    }

    /**
     * Define Aura\Cli factories, services, and params
     *
     * @param Container $di DI Container
     *
     * @return void
     *
     * @access public
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function define(Container $di)
    {
        if (! isset($di->values[static::GLOBALS])) {
            $di->values[static::GLOBALS] = $this->globals;
        }

        $di->set(static::FACTORY, $di->lazyNew(Factory::class));

        $di->set(
            static::CONTEXT,
            $di->lazyGetCall(
                static::FACTORY,
                'newContext',
                $di->lazyValue(static::GLOBALS)
            )
        );

        $di->set(
            static::STDIO,
            $di->lazyGetCall(static::FACTORY, 'newStdio')
        );

        $di->params[Help::class]
            ['option_factory'] = $di->lazyNew(OptionFactory::class);
    }
}
