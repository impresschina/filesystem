<?php

namespace Dovelet;

/**
 * Class FileSystem
 * @package Dovelet
 */
class FileSystem extends \Gaufrette\Filesystem
{
    /**
     * @var LocalAdapter
     */
    protected $adapter;

    /**
     * @var
     */
    private $path;

    /**
     * @param \Gaufrette\Adapter $adapter A configured Adapter instance
     */
    public function __construct(\Gaufrette\Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param $content
     * @param null $path
     */
    public function append($content, $path = null)
    {
        if (is_null($path))
            $path = $this->path;

        $this->adapter->append($path, $content);
    }

    /**
     * @param $path
     * @return $this
     */
    public function path($path)
    {
        if (empty($path)) {
            throw new \InvalidArgumentException('Object path is empty.');
        }

        $this->path = &$path;

        return $this;
    }

    /**
     * @param $path
     * @param $content
     * @param bool $overwrite
     * @return bool|int
     */
    public function write($path, $content, $overwrite = false)
    {
        return parent::write($path, $content, $overwrite);
    }

    /**
     * @param $path
     * @return bool|string
     */
    public function read($path)
    {
        return parent::read($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isDirectory($path)
    {
        return parent::isDirectory($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function has($path)
    {
        return parent::has($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function del()
    {
        if (is_file($this->path))
            return parent::delete($this->path);
        return false;
    }
}