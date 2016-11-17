<?php

namespace SimpleSAML;

/**
 * This file implements functions to read and write to a group of memcache
 * servers.
 *
 * The goals of this storage class is to provide failover, redudancy and load
 * balancing. This is accomplished by storing the data object to several
 * groups of memcache servers. Each data object is replicated to every group
 * of memcache servers, but it is only stored to one server in each group.
 *
 * For this code to work correctly, all web servers accessing the data must
 * have the same clock (as measured by the time()-function). Different clock
 * values will lead to incorrect behaviour.
 *
 * @author Olav Morken, UNINETT AS.
 * @package SimpleSAMLphp
 */
class Memcache
{
    /**
     * Find data stored with a given key.
     *
     * @param string $key The key of the data.
     *
     * @return mixed The data stored with the given key, or null if no data matching the key was found.
     */
    public static function get($key)
    {
        return ssp_service('memcache.servers.group')->get($key);
    }

    /**
     * Save a key-value pair to the memcache servers.
     *
     * @param string       $key The key of the data.
     * @param mixed        $value The value of the data.
     * @param integer|null $expire The expiration timestamp of the data.
     */
    public static function set($key, $value, $expire = null)
    {
        ssp_service('memcache.servers.group')->set($key, $value, $expire = null);
    }

    /**
     * Delete a key-value pair from the memcache servers.
     *
     * @param string $key The key we should delete.
     */
    public static function delete($key)
    {
        ssp_service('memcache.servers.group')->delete($key);
    }

    /**
     * This function retrieves statistics about all memcache server groups.
     *
     * @return array Array with the names of each stat and an array with the value for each server group.
     *
     * @throws \Exception If memcache server status couldn't be retrieved.
     */
    public static function getStats()
    {
        return ssp_service('memcache.servers.group')->getStats();
    }

    /**
     * Retrieve statistics directly in the form returned by getExtendedStats, for
     * all server groups.
     *
     * @return array An array with the extended stats output for each server group.
     */
    public static function getRawStats()
    {
        return ssp_service('memcache.servers.group')->getRawStats();
    }
}
