<?php
namespace Links;

use Goutte\Client;

class Link implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var int
     */
    protected $ip;
    /**
     * @var int
     */
    protected $port;
    /**
     * @var string
     */
    protected $part;
    /**
     * @var string
     */
    protected $href;
    /**
     * @var string
     */
    protected $icon;

    public function __construct($data = null)
    {
        if ($data != null and is_array($data)) {
            $this->fill($data);
        }
    }
    public function fill(array $data)
    {
        $this->cleanUp($data);
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    public function edit(array $data)
    {
        $this->cleanUp($data);
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key != $value) {
                    $this->$key = $value;
                }
            }
        }
    }
    protected function cleanUp(array &$data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $type = $this->getType($key);
                if ($type != 'string') {
                    settype($value, $type);
                }
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function status()
    {
    	$url = $this->getHref();
    	$client = new Client();
    	$client->request('GET', $url);
    	if ($client->getResponse()->getStatus() == 200) {
    		return true;
    	}
    	return false;
    }
    public function getHref()
    {
        if (isset($this->href)) {
            return $this->href;
        }
        return 'http://192.168.1.' . $this->ip . ':' . $this->port . '/' . $this->part;
    }

    public function __set($name, $value)
    {
        $data = $this->cleanUp([$name => $value]);
        $value = $data[$name];
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
    protected function getType($name)
    {
        $ref = new \ReflectionObject($this);
        $prop = $ref->getProperty($name);
        $doc = $prop->getDocComment();
        $ini = strpos($doc, '@var') + strlen('@var ');
        $end = strpos($doc, PHP_EOL, $ini);
        $type = trim(substr($doc, $ini, $end - $ini));
        return $type;
    }
    public function __get($name)
    {
        if (method_exists($this, 'get' . ucwords($name))) {
            return $this->{'get' . ucwords($name)}();
        }
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function jsonSerialize()
    {
        $arr = [];
        foreach ($this as $key => $value) {
            if ($value != null) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}
?>
