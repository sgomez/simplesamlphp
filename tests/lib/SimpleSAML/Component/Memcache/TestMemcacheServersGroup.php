<?php
/*
 * This file is part of the simplesamlphp.
 *
 * (c) Sergio Gómez <sergio@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use SimpleSAML\Component\Memcache\MemcacheServersGroup;

class TestMemcacheServersGroup extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Exception
     */
    public function testGetExpireTimeException()
    {
        $configuration = $this->getMockBuilder('\SimpleSAML\Configuration')
            ->disableOriginalConstructor()
            ->getMock();

        $configuration
            ->expects($this->once())
            ->method('getInteger')
            ->with('memcache_store.expires', 0)
            ->willReturn(-1)
        ;

        $memcacheServersGroup = new MemcacheServersGroup($configuration);
        $memcacheServersGroup->set('key', 'value');
    }
}
