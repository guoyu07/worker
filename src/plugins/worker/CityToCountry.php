<?php

namespace ch\tebe\worker\plugins\worker;

use ch\tebe\worker\AbstractWorker;

class CityToCountry extends AbstractWorker
{
    /**
     * @return array
     */
    public function getKeys()
    {
        return [
            'countries',
            'cities'
        ];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'cityToCountry';
    }

    /**
     * @return array
     */
    public function work()
    {
        $result = [];
        foreach ($this->data['countries'] as $code => $name) {
            $result[$code] = [
                'name' => $name,
                'cities' => $this->getCities($code)
            ];
        }
        return $result;
    }

    /**
     * @param string $countryCode
     * @return array
     */
    protected function getCities($countryCode)
    {
        $cities = array();
        foreach ($this->data['cities'] as $city) {
            if ($city['countryCode'] == $countryCode) {
                $cities[] = $city['city'];
            }
        }
        return $cities;
    }
}
