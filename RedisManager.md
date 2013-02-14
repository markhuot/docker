Redis
====

Introduction
----
Redis is an open source, advanced key-value store. It is often referred to as a data structure server since keys can contain strings, hashes, lists, sets, and sorted sets.


::connection($name)
----
Get a Redis connection instance by name.

```php
$redis->connection('prod'); // returns Illuminate\Redis\Database
```


->createConnection($name)
----

Passed a config name this method returns a Redis connection that you can
run your get's and set's on.

```php
$redis = Redis::connection('prod')
$redis->set('name', 'Mark');
$redis->get('name'); // returns 'Mark'
```


->getConfig($name)
----

Returns a Redis config. 


->getDefaultConnection()
----

Simply returs the string 'default'.