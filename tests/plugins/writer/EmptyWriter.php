<?php

namespace ch\tebe\workertest\plugins\writer;

use ch\tebe\worker\AbstractWriter;

class EmptyWriter extends AbstractWriter
{

    /**
     * @return array
     */
    public function write()
    {
        $files = glob(__DIR__ . '/../../data/output/*.txt'); // get all file names
        foreach($files as $file) {
            if(is_file($file)) {
                unlink($file);
            }
        }
    }

}
