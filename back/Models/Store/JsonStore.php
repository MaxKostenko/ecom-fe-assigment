<?php
namespace Models\Store;

class JsonStore implements StoreInterface {

    protected $filePath;

    function __construct($config)
    {
        $this->filePath = $config['filesPath'];
    }

    private function buildFilePath($name) {
        return "{$this->filePath}{$name}.json";
    }

    public function setData($key, $data)
    {
        file_put_contents($this->buildFilePath($key), json_encode($data));
    }

    public function getData($key)
    {
        $path = $this->buildFilePath($key);
        if(file_exists($path)) {
            $content = file_get_contents($path);
            try {
                return json_decode($content, true);
            } catch (\Exception $e) {

            }
        }
        return null;
    }
}