<?php
namespace CartFrame;

class ConfigIni
{
    protected $filePath = '';
    protected $fileContent = [];

    /**
     * @param string $directoryPath Directory path for config file
     * @param string $filename Config file name
     * @throws \InvalidArgumentException
     */
    public function __construct(string $directoryPath = '../', string $filename = 'config.ini')
    {
        $this->filePath = realpath($directoryPath . $filename);
        if(!$this->filePath) {
            throw new \InvalidArgumentException($directoryPath . $filename . ' not found');
        }

        $this->fileContent = parse_ini_file ($this->filePath, false, INI_SCANNER_TYPED);
        if(!$this->fileContent) {
            throw new \InvalidArgumentException($this->filePath . ' can not read');
        }
    }

    /**
     * @param string $key Key name in config file
     * @return string Value of key in config file
     * @throws \InvalidArgumentException
     */
    public function get(string $key): string
    {
        if(!array_key_exists($key, $this->fileContent)) {
            throw new \InvalidArgumentException($key . ' does not exist in config file ' . $this->filePath);
        }
        return $this->fileContent[$key];
    }
}