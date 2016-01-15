<?php

namespace Fferriere\GeneratorExample\Service\Exporter;

use Fferriere\GeneratorExample\Exception\Exception;
use Fferriere\GeneratorExample\Exception\FileException;

class CsvExporter
{

    private $filename;
    private $fileHandle;

    private $delimiter;
    private $enclosure;

    public function __construct($filename, $delimiter = ';', $enclosure = '"')
    {
        $this->checkFilename($filename);
        $this->checkDelimiter($delimiter);
        $this->checkEnclosure($enclosure);

        $this->filename = $filename;
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
    }

    protected function checkFilename($filename) {
        if (is_file($filename)) {
            if (!is_writable($filename)) {
                throw new FileException(sprintf('The file "%s" is not writable !', $filename));
            }
            return true;
        }

        $dirpath = dirname($filename);
        if (!is_dir($dirpath)) {
            throw new FileExcpetion(sprintf('The directory "%s" does not exists !', $dirpath));
        } else {
            if (!is_writable($dirpath)) {
                throw new FileExcpetion(sprintf('The directory "%s", is not writable !', $dirpath));
            }
        }

        return true;
    }

    protected function checkDelimiter($delimiter)
    {
        if (strlen($delimiter) != 1) {
            throw new Exception('fputcsv delimiter must have one character !');
        }
    }

    protected function checkEnclosure($enclosure)
    {
        if (strlen($enclosure) != 1) {
            throw new Exception('fputcsv enclosure must have one character !');
        }
    }

    protected function checkDatas($datas)
    {
        if (!is_array($datas) && ! $datas instanceof \Traversable) {
            throw new Exception('datas is not array or \Traversable instance !');
        }
    }

    public function export($datas)
    {
        $this->checkDatas($datas);
        $this->openFile();
        try {
            foreach ($datas as $data) {
                $this->exportData($data);
            }
        } catch(Exception $e) {
            throw $e;
        } finally {
            $this->closeFile();
        }
    }

    protected function exportData($data)
    {
        return fputcsv($this->fileHandle, $data, $this->delimiter, $this->enclosure);
    }

    protected function openFile()
    {
        if (is_resource($this->fileHandle)) {
            return;
        }
        $this->fileHandle = fopen($this->filename, 'w');
    }

    protected function closeFile()
    {
        if (!is_resource($this->fileHandle)) {
            return;
        }
        fclose($this->fileHandle);
    }

}
