<?php

/**
 * This file is part of configSupporter package.
 *
 * (c) Kshitiz Srivastava <developer.kshitiz19@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kshitiz;

/**
 * ConfigSupporter Main Class
 *
 * @author Kshitiz Srivastava <developer.kshitiz19@gmail.com>
 * @since  Tues July 07 14:37:36 IST 2020
 * 
 * @package Kshitiz
 */
class ConfigSupporter implements \ArrayAccess
{
    protected $values = array();

    /**
     * Load the Configuration
     */
    public function load(ConfigLoaderInterface $configLoader)
    {
        $configLoader->load($this);
    }

    /**
     * Provides the Loaded configurations so far
     * @return array
     */
    public function provision()
    {
        return $this->values; 
    }

    /**
     * Sets a parameter or an object.
     *
     * @param string $offset Unique identifier for the parameter
     * @param mixed  $value  The value of the parameter
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    /**
     * Checks if a parameter or an object is set.
     *
     * @param string $offset The unique identifier for the parameter or object
     *
     * @return Boolean
     */
    public function offsetExists($offset) {
        return isset($this->values[$offset]);
    }
    
    /**
     * Unsets a parameter or an object.
     *
     * @param string $offset The unique identifier for the parameter or object
     */
    public function offsetUnset($offset) {
        unset($this->values[$offset]);
    }

    /**
     * Gets a parameter or an object.
     *
     * @param string $offset The unique identifier for the parameter or object
     *
     * @return mixed The value of the parameter or an object
     */
    public function offsetGet($offset) {
        return isset($this->values[$offset]) ? $this->values[$offset] : null;
    }
}
