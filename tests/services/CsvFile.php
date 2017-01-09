<?php

namespace ch\tebe\workertest\services;

class CsvFile
{
    /**
     * @param string $filename
     * @return array
     */
    public function read($filename)
    {
        $csv = [];
        foreach (array_map('str_getcsv', file($filename)) as $line => $data) {
            $csv[] = $data;
        }
        return $csv;
    }

    /**
     * @param string $filename
     * @param array $data
     * @return int
     */
    public function write($filename, array $data)
    {
        return file_put_contents($filename, implode($data, "\n"));
    }

}
