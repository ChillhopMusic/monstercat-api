<?php

namespace MonsterCat;

abstract class Client {
    const MSG_TYPE_ERROR = 'e';
    const MSG_TYPE_SUCCESS = 's';
    const MSG_TYPE_INFO = 'i';

    /**
     * After setting the value of the API method,
     * we call it with this function.
     */
    function call() {
        
    }

    /**
     *
     * @param string $method GET, POST, PUT, DELETE
     * @param object $params list of parameters to be sent.
     * @param string $uri the endpoint we are triggering
     * 
     * @return array
     */
    public function get(?object $params, string $uri = '') {

        $client = new \GuzzleHttp\Client([
            'base_uri' => \MONSTERCAT_API_ENDPOINT,
            'timeout' => 30,
        ]);

        $query = $params ? (array) $params : [];

        $options = [
            'headers' => [
                'Authorization' => \MONSTERCAT_API_KEY,
            ],
        ];

        if ($query) {
            $options['query'] = $query;
        }

        try {
            $response = $client->get($uri, $options);
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            // need better error handling
            return $this->handleErr($ex);
        } catch (\GuzzleHttp\Exception\ConnectException $ex) {
            // need better error handling
            return $this->handleErr($ex);
        } catch (Error | Exception $ex) {
            // need better error handling
            return $this->handleErr($ex);
        }

        $res = json_decode($response->getBody());
        return $res;
    }

    /**
     *
     * @param Exception | Error $er
     * @return boolean
     */
    public function handleErr(\Error | \Exception $er) {
        // need better error handling
        $this->echo($er->getMessage(), static::MSG_TYPE_ERROR);
        return false;
    }

    /**
     * Gives error color
     * 
     * @param type $str
     * @param type $type
     */
    function echo($str, $type = self::MSG_TYPE_INFO) {
        switch ($type) {
            case 'e': //error
                echo "\033[31m$str \033[0m";
                break;
            case 's': //success
                echo "\033[32m$str \033[0m";
                break;
            case 'i': //info
                echo "\033[36m$str \033[0m";
                break;
            default:
                # code...
                break;
        }

        echo PHP_EOL;
    }

    /**
     *
     * @param string $method GET, POST, PUT, DELETE
     * @param object $params list of parameters to be sent.
     * @param string $uri the endpoint we are triggering
     *
     * @return array
     */
    public function post($params, string $uri) {

        $body = $params && is_array($params) ? (object) $params : $params;

        $client = new \GuzzleHttp\Client([
            'base_uri' => \MONSTERCAT_API_ENDPOINT,
            'timeout' => 30.0,
        ]);

        $options = [
            'headers' => [
                'Authorization' => \MONSTERCAT_API_KEY
            ],
        ];

        if ($body) {
            $options['body'] = json_encode($body);
        }

        try {
            $response = $client->post($uri, $options);
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            return $this->handleErr($ex);
        } catch (\GuzzleHttp\Exception\ConnectException $ex) {
            return $this->handleErr($ex);
        } catch (\Error | \Exception $ex) {
            return $this->handleErr($ex);
        }

        $res = json_decode($response->getBody());
        return $res;
    }
    /**
     * 
     *
     * @param type $uri
     */

    /**
     * TODO this should be done with Guzzle.
     * 
     * @param string $uri
     * @param array $fields
     * @return boolean
     * @throws Exception
     */
    public function post_files($uri, $fields = []) {

        $commands = [];
        foreach ($fields as $key => $file) {
            if (!is_file($file)) {
                throw new Exception($file . ' Not found on local machine');
            }

            $commands[] = sprintf('%s=@%s', $key, $file);
        }

        $url = sprintf('%s%s', \MONSTERCAT_API_ENDPOINT, $uri);

        $curl = sprintf(
            'curl POST -H "Content-Type: multipart/form-data" '
            . " -H 'Authorization: %s'"
            . " -F %s %s",
            \MONSTERCAT_API_KEY,
            join(' -F ', $commands),
            $url
        );

        $output = [];
        exec($curl, $output);
        if ($output) {
            $this->handleErr(join(PHP_EOL, $output));
            return null;
        }

        return true;
    }
}