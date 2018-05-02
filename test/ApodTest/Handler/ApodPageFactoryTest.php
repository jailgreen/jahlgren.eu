<?php
/**
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

declare(strict_types=1);

namespace ApodTest\Handler;

use Apod\Handler\ApodPage;
use Apod\Handler\ApodPageFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Description of ApodPageFactoryTest
 *
 * @author jailgreen jukka@jahlgren.eu
 */
class ApodPageFactoryTest extends TestCase
{
    public function testFactoryInvocationReturnsApodPageInstance() : void
    {
        $factory   = new ApodPageFactory();
        $container = $this->prophesize(ContainerInterface::class);

        $container
                ->get(TemplateRendererInterface::class)
                ->willReturn($this->prophesize(TemplateRendererInterface::class))
                ->shouldBeCalled();

        $page = $factory($container->reveal());

        $this->assertInstanceOf(ApodPage::class, $page);
    }
}
