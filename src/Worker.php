<?php

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
            if (!$reader instanceof ReaderInterface) {
                throw new Exception("Reader class must implement ReaderInterface");
            }
            $id = $reader->getId();
            $this->data[$id] = $reader->read();
        }
    }

    protected function work()
    {
        foreach ($this->config['plugins']['worker'] as $workerClass) {
            $worker = new $workerClass();
            if (!$worker instanceof WorkerInterface) {
                throw new Exception("Worker class must implement WorkerInterface");
            }
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
            if (!$writer instanceof WriterInterface) {
                throw new Exception("Writer class must implement WriterInterface");
            }
            foreach ($writer->getKeys() as $key) {
                $writer->setData($key, $this->data[$key]);
            }
            $writer->write();
        }
    }

}
