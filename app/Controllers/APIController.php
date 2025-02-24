<?php

namespace App\Controllers;

use Config\Services;

class APIController extends BaseController
{
    public function fetchProvinces()
    {
        $client = Services::curlrequest();
        $url = 'https://psgc.gitlab.io/api/provinces/';

        try {
            $response = $client->get($url); // Send the GET request

            if ($response->getStatusCode() == 200) { // Check if the response status code is OK
                $data = json_decode($response->getBody(), true); // Decode the JSON response body

                if ($data) {
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'No data found']); // If the data is empty or invalid, return an error
                }

            } else {
                echo json_encode(['error' => 'Failed to fetch data, status code: ' . $response->getStatusCode()]); // Handle non-200 responses
            }

        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Catch HTTP exceptions, e.g., network issues
            echo json_encode(['error' => 'API request failed: ' . $e->getMessage()]);
            log_message('error', 'API Request failed: ' . $e->getMessage());
        }
    }

    public function fetchDataCity()
    {
        $client = Services::curlrequest();
        $url = 'https://psgc.gitlab.io/api/cities-municipalities/';

        try {
            $response = $client->get($url); // Send the GET request

            if ($response->getStatusCode() == 200) { // Check if the response status code is OK
                $data = json_decode($response->getBody(), true); // Decode the JSON response body

                if ($data) {
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'No data found']); // If the data is empty or invalid, return an error
                }

            } else {
                echo json_encode(['error' => 'Failed to fetch data, status code: ' . $response->getStatusCode()]); // Handle non-200 responses
            }
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Catch HTTP exceptions, e.g., network issues
            echo json_encode(['error' => 'API request failed: ' . $e->getMessage()]);
            log_message('error', 'API Request failed: ' . $e->getMessage());
        }
    }


    public function fetchDataBarangay($code)
    {
        $client = Services::curlrequest();
        $url = "https://psgc.gitlab.io/api/cities-municipalities/$code/barangays/";
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }
    }

}

