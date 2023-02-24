<?php
/**
 * User: LITVAN
 * Date: 4/6/14
 * Time: 3:24 AM
 */

namespace Beon\IntranetBundle\Assetic\Filter;


use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;

class BeonCssRewriterFilter implements FilterInterface
{

    /**
     * Filters an asset after it has been loaded.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterLoad(AssetInterface $asset)
    {
        // TODO: Implement filterLoad() method.
    }

    /**
     * Filters an asset just before it's dumped.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterDump(AssetInterface $asset)
    {
        $content = $asset->getContent();

        $sourcePath = str_replace('Resources/public', 'bundles/intranet', $asset->getSourcePath());
        $sourcePath = '/' . trim($sourcePath, '/') . '/';
        $sourcePath = dirname($sourcePath);

        $content = preg_replace_callback('/url.*?\((.*?)\)/', function ($var) use($sourcePath) {
            $path = trim($var[1], '\'"');

            if (preg_match('/^[^\/]/', $path)) {
                return 'url("'.$sourcePath.'/'.$path.'")';
            }

            return $var;
        }, $content);

        $asset->setContent($content);
    }
}