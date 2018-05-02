<?php
/**
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

declare(strict_types=1);

namespace ApodTest\Handler;

use Apod\Handler\ApodPage;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Description of ApodPageTest
 *
 * @author jailgreen jukka@jahlgren.eu
 */
class ApodPageTest extends TestCase
{
    public function testResponseRendersCorrectPage() : void
    {
        $renderer = $this->prophesize(TemplateRendererInterface::class);
        $renderer
                ->render(ApodPage::TEMPLATE, Argument::type('array'))
                ->willReturn('page-content')
                ->shouldBeCalled();

        $request = $this->prophesize(ServerRequestInterface::class);

        $page     = new ApodPage($renderer->reveal());
        $response = $page->handle($request->reveal());

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals('page-content', $response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('text/html', $response->getHeaderLine('Content-Type'));
    }
}
