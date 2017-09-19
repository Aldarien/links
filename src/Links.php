<?php
namespace Links;

class Links implements \IteratorAggregate
{
    protected $filename;
    protected $links;

    public function __construct(string $filename = '')
    {
        if ($filename == '') {
            $filename = config('locations.resources') . '/links.json';
        }
        $this->filename = $filename;
    }
    public function loadFile()
    {
        $string = trim(file_get_contents($this->filename));
        $json = json_decode($string, true);
        $this->links = [];
        foreach ($json as $key => $data) {
            $link = new Link($data);
            $this->links[$key] = $link;
        }
    }
    public function saveFile()
    {
        $string = json_encode($this->links, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return file_put_contents($this->filename, $string);
    }
    public function add(string $key, Link $link)
    {
        if ($this->links == null) {
            $this->loadFile();
        }
        if (!isset($this->links[$key])) {
            $this->links[$key] = $link;
            return true;
        }
        return false;
    }
    protected function exists(string $key)
    {
        return isset($this->links[$key]);
    }
    public function edit(string $key, array $data)
    {
        if ($this->links == null) {
            $this->loadFile();
        }
        if ($this->exists($key)) {
            $link = $this->links[$key];
            $link->edit($data);
        } else {
            $link = new Link($data);
        }
        $this->links[$key] = $link;
    }
    public function remove()
    {
        if ($this->links == null) {
            $this->loadFile();
        }
        if (isset($this->links[$key])) {
            unset($this->links[$key]);
            return true;
        }
        return false;
    }
    public function get(string $key)
    {
        if ($this->links == null) {
            $this->loadFile();
        }
        if ($this->exists($key)) {
            return $this->links[$key];
        }
        return null;
    }

    public function getIterator()
    {
        if ($this->links == null) {
            $this->loadFile();
        }
        return new \ArrayIterator($this->links);
    }
}
?>
