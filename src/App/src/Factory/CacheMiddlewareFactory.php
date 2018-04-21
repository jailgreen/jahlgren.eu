<?php
/**
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

declare(strict_types=1);

namespace App\Factory;

use Middlewares\Cache;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;

/**
 * Description of CacheMiddlewareFactory
 *
 * @author jailgreen jukka@jahlgren.eu
 */
class CacheMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : Cache
    {
        return new Cache($container->get(CacheItemPoolInterface::class));
    }
}
