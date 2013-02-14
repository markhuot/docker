<?php namespace Illuminate\Redis;

use Illuminate\Support\Manager;

/**
 * Redis
 * ====
 *
 * Introduction
 * ----
 * Redis is an open source, advanced key-value store. It is often referred to as a data structure server since keys can contain strings, hashes, lists, sets, and sorted sets.
 */
class RedisManager {

  protected $app;
  protected $connections = array();

  public function __construct($app)
  {
    $this->app = $app;
  }

  /**
   * ::connection($name)
   * ----
   * Get a Redis connection instance by name.
   *
   * ```php
   * $redis->connection('prod'); // returns Illuminate\Redis\Database
   * ```
   */
  public function connection($name = null)
  {
    if ( ! isset($this->connections[$name]))
    {
      $this->connections[$name] = $this->createConnection($name);
    }

    return $this->connections[$name];
  }

  /**
   * ->createConnection($name)
   * ----
   *
   * Passed a config name this method returns a Redis connection that you can
   * run your get's and set's on.
   *
   * ```php
   * $redis = Redis::connection('prod')
   * $redis->set('name', 'Mark');
   * $redis->get('name'); // returns 'Mark'
   * ```
   */
  protected function createConnection($name)
  {
    $config = $this->getConfig($name);

    $connection = new Database($config['host'], $config['port'], $config['database']);

    $connection->connect();

    return $connection;
  }

  /**
   * ->getConfig($name)
   * ----
   *
   * Returns a Redis config. 
   */
  protected function getConfig($name)
  {
    $name = $name ?: $this->getDefaultConnection();

    // To get the database connection configuration, we will just pull each of the
    // connection configurations and get the configurations for the given name.
    // If the configuration doesn't exist, we'll throw an exception and bail.
    $connections = $this->app['config']['database.redis'];

    if (is_null($config = array_get($connections, $name)))
    {
      throw new \InvalidArgumentException("Redis [$name] not configured.");
    }

    return $config;
  }

  /**
   * ->getDefaultConnection()
   * ----
   *
   * Simply returs the string 'default'.
   */
  protected function getDefaultConnection()
  {
    return 'default';
  }

  public function __call($method, $parameters)
  {
    return call_user_func_array(array($this->connection(), $method), $parameters);
  }

}