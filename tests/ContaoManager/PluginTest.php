<?php
/**
 * Copyright (c) 2017 Heimrich & Hannot GmbH
 *
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\HeadBundle\Test\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use HeimrichHannot\HeadBundle\ContaoManager\Plugin;
use HeimrichHannot\HeadBundle\HeimrichHannotContaoHeadBundle;
use PHPUnit\Framework\TestCase;

/**
 * Test the plugin class
 * Class PluginTest
 * @package HeimrichHannot\HeadBundle\Test\ContaoManager
 */
class PluginTest extends TestCase
{
    public function testInstantiation()
    {
                static::assertInstanceOf(Plugin::class, new Plugin());




    }

    public function testGetBundles()
    {
        $plugin = new Plugin();

        /** @var BundleConfig[] $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        static::assertCount(1, $bundles);
        static::assertInstanceOf(BundleConfig::class, $bundles[0]);
        static::assertEquals(HeimrichHannotContaoHeadBundle::class, $bundles[0]->getName());
        static::assertEquals([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }
}