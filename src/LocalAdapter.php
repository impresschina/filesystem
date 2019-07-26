<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 2019-07-26
 * Time: 17:16
 */

namespace Dovelet;

use Gaufrette\Adapter\Local;

class LocalAdapter extends Local
{
    /**
     * @param $path
     * @param $content
     */
    public function append($path, $content)
    {
        $path = $this->computePath($path);
        $this->ensureDirectoryExists(\Gaufrette\Util\Path::dirname($path), true);

        $file = fopen($path, 'a+');
        fwrite($file, $content);
        fclose($file);
    }
}