<?php

namespace MonsterCat;

use GuzzleHttp\Client;

class Client {

    /**
     *
     * @param string $method GET, POST, PUT, DELETE
     * @param object $params list of parameters to be sent.
     * @param string $uri the endpoint we are triggering
     * 
     * @return type
     */
    public function get(string $method, object $params, string $uri) {

        $client = new Client([
            'base_uri' => API_ENDPOINT,
            'timeout' => 2.0,
        ]);

        $query = (array) $params;

        $credentials = base64_encode(sprintf('%s:%s', API_KEY, API_USER));
        $response    = $client->get($uri,
            [
                'query' => $query,
                'headers' => [
                    'Authorization' => 'Basic ' . $credentials,
                ],
            ]
        );

        return ($response->getBody());

    }

    /**
     * Loads the environment variables, these should be loaded in your application.
     *
     * add env variables:
     * API_KEY, API_USER, API_ENDPOINT
     *
     *
     * @throws Exception
     */
    public function loadTest() {

        /**
         * Get the file and check if it exists
         */
        $file = sprintf('%s/.env', dirname(__FILE__));
        if (!file_exists($file)) {
            throw new Exception('Env file is mising');
        }

        /**
         * Load the content, create lines based on breaks
         */
        $content = file_get_contents($file);
        $lines   = explode(PHP_EOL, $content);

        foreach ($lines as $line) {
            /**
             * Get from each line the key and value
             */
            $parts = explode('=', $line);
            $name  = trim($parts[0]);
            $value = trim($parts[1]);
            if (!defined($name)) {
                /**
                 * Define the property
                 */
                define($name, $value);
            }
        }
    }
}