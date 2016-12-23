<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 23.12.16
 * Time: 07:11
 */

namespace ch\tebe\worker;

class Worker
{

    /** @var array */
    private $config;
    /** @var array */
    private $params;
    /** @var array */
    private $data;

    public function __construct(array $params, array $config)
    {
        $this->params = $params;
        $this->config = $config;
    }

    public function run()
    {
        $this->read();
        $this->work();
        $this->write();
    }

    protected function read()
    {
        foreach ($this->config['plugins']['reader'] as $readerClass) {
            $reader = new $readerClass();
            $id = $reader->getId();
            $this->data[$id] = $reader->read();
        }
    }

    protected function work()
    {
        foreach ($this->config['plugins']['worker'] as $workerClass) {
            $worker = new $workerClass();
            $id = $worker->getId();
            $keys = $worker->getKeys();
            foreach ($keys as $key) {
                $worker->setData($key, $this->data[$key]);
            }
            if (null !== $id) {
                $this->data[$id] = $worker->work();
            } else {
                $worker->work();
            }
        }
    }

    protected function write()
    {
        foreach ($this->config['plugins']['writer'] as $writerClass) {
            $writer = new $writerClass();
            foreach ($writer->getKeys() as $key) {
                $writer->setData($key, $this->data[$key]);
            }
            $writer->write();
        }
    }

}
