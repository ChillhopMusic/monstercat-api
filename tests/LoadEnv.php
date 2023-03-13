<?php
/**
 * Loads the environment variables, these should be loaded in your application.
 *
 * add env variables:
 * MONSTERCAT_API_KEY, MONSTERCAT_API_USER, MONSTERCAT_API_ENDPOINT
 *
 *
 * @throws Exception
 */
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
