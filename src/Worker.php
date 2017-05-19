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
    /** @var array */
    private $services;

    public function __construct(array $params, array $config)
    {
        $this->data = [];
        $this->config = $config;
        $this->params = $params;
        $this->services = [];
    }

    public function run()
    {
        $this->read();
        $this->work();
        $this->write();
    }

    /**
     * @param string $name
     * @param object $service
     * @throws Exception
     */
    public function setService($name, $service)
    {
        if (!is_object($service)) {
            throw new Exception("Service has to be an object");
        }
        $this->services[$name] = $service;
    }

    /**
     * @param string $name
     * @return object
     */
    public function getService($name)
    {
        return $this->services[$name];
    }

    /**
     * @param $name
     */
    public function unsetService($name)
    {
        unset($this->services[$name]);
    }

    protected function read()
    {
        foreach ($this->config['plugins']['reader'] as $readerClass) {
            $reader = new $readerClass();
            if (!$reader instanceof ReaderInterface) {
                throw new Exception("Reader class must implement ReaderInterface");
            }
            $reader->setServices($this->services);
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
            $worker->setServices($this->services);
            foreach ($worker->getKeys() as $key) {
                $worker->setData($key, $this->data[$key]);
            }
            $id = $worker->getId();
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
            $writer->setServices($this->services);
            foreach ($writer->getKeys() as $key) {
                $writer->setData($key, $this->data[$key]);
            }
            $writer->write();
        }
    }

}
