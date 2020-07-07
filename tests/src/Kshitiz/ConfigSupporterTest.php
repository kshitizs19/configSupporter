<?php

/*
 * This file is part of configSupporter Package.
 *
 * (c) Kshitiz Srivastava <developer.kshitiz19@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kshitiz;

/**
 * @author Kshitiz Srivastava <developer.kshitiz19@gmail.com>
 */
class ConfigSupporterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $expectedConfiguration = array (
        '__PREFIX__'  => array (
            'general' => array (
                'debug'         => 'true',
                'connections'   => 1000,
            ),
            'log' => array (
                'filename' => 'my-test.log',
                'level' => array ('INFO', 'DEBUG'),
            ),
            'API' => array (
                'key'    => 'my-personalize-key',
                'secret' => 'my-highly-secure-secret',
            ),
        ),
    );

    /**
     * Test Provision
     *
     * TODO: Need to improve and write more UnitTests
     * This is written with bare minimum test 
     */
    public function testProvision()
    {
        $configSupporter = new ConfigSupporter();
        $configSupporter->load(new ConfigLoader(__DIR__."/fixtures/config.json", array('ENV' => 'test'), null, '__PREFIX__'));
        $configSupporter->load(new ConfigLoader(__DIR__."/fixtures/config.php", array('ENV' => 'test'), null, '__PREFIX__'));

        $this->assertEquals($configSupporter->provision(), $this->expectedConfiguration);
    }
}
