<?php
// @codingStandardsIgnoreFile

namespace Fusible\CliProvider;

use Aura\Di\AbstractContainerConfigTest;

class ConfigTest extends AbstractContainerConfigTest
{
    protected function getConfigClasses()
    {
        return [Config::class];
    }

    public function provideGet()
    {
        return [
            [ 'aura/cli:factory', 'Aura\Cli\CliFactory' ],
            [ 'aura/cli:context', 'Aura\Cli\Context' ],
            [ 'aura/cli:stdio', 'Aura\cli\Stdio' ],
        ];
    }

    public function provideNewInstance()
    {
        return [
            ['Aura\Cli\Help']
        ];
    }

}

