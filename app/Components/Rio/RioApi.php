<?php
/**
 * Created by PhpStorm.
 * User: exxxa
 * Date: 07.07.2019
 * Time: 15:29
 */

namespace AutoKit\Components\Rio;

class  RioApi
{

    protected $apiKey = "z8mnjiU2rKUg7pQScey1WhjDPZaeogbyh6aS5leK";

    private function get($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            'api_key' => $this->apiKey
        ]]);

        return json_decode($response->getBody(), true);
    }

    public function getCategories()
    {
        return $this->get(
            "https://developers.ria.com/auto/categories"
        );

    }

    public function getBodyStyles($id = 1)
    {

        return $this->get(
            "https://developers.ria.com/auto/categories/$id/bodystyles"
        );

    }

    public function getMarks($id = 1)
    {
        return $this->get(
            "https://developers.ria.com/auto/categories/$id/marks"
        );
    }

    public function getModels($id = 1, $mark = 1)
    {
        return $this->get(
            "https://developers.ria.com/auto/categories/$id/marks/$mark/models"
        );
    }

    public function getGearboxes($id = 1)
    {
        return $this->get(
            "https://developers.ria.com/auto/categories/$id/gearboxes"
        );
    }

    public function getDriverType($id = 1)
    {
        return $this->get(
            "https://developers.ria.com/auto/categories/$id/driverTypes"
        );
    }

    public function getFuelType()
    {
        return $this->get(
            "https://developers.ria.com/auto/type"
        );
    }

    public function getAutoOptions($id = 1)
    {
        return $this->get(
            "https://developers.ria.com/auto/categories/$id/auto_options"
        );
    }
}