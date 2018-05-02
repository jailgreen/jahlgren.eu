<?php
/**
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

declare(strict_types=1);

namespace ApodTest;

use Apod\ConfigProvider;
use PHPUnit\Framework\TestCase;

/**
 * Description of ConfigProviderTest
 *
 * @author jailgreen jukka@jahlgren.eu
 */
class ConfigProviderTest extends TestCase
{
    /**
     * @var ConfigProvider
     */
    private $provider;

    protected function setUp() : void
    {
        $this->provider = new ConfigProvider();
    }

    public function testInvocationReturnsArrayWithDependencies() : void
    {
        $config = ($this->provider)();

        $this->assertInternalType('array', $config);
        $this->assertArrayHasKey('dependencies', $config);
        $this->assertArrayHasKey('factories', $config['dependencies']);

        $this->assertCount(1, $config['dependencies']['factories']);
    }

    public function testProviderDefinesExpectedFactoryServices() : void
    {
        $config    = $this->provider->getDependencies();
        $factories = $config['factories'];

        $this->assertArrayHasKey(\Apod\Handler\ApodPage::class, $factories);
    }
}
