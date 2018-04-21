<?php
/**
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

declare(strict_types=1);

namespace App\Factory;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Description of CacheFactory
 *
 * @author jailgreen jukka@jahlgren.eu
 */
class CacheFactory
{
    public function __invoke(ContainerInterface $container) : CacheItemPoolInterface
    {
        return new FilesystemAdapter('', 0, 'data/cache/doctrine');
    }
}
