Redis
====

Introduction
----
Redis is an open source, advanced key-value store. It is often referred to as a data structure server since keys can contain strings, hashes, lists, sets, and sorted sets.


::connection($name)
----
Get a Redis connection instance by name.

```php
$redis->connection('prod');
```

This is typically called through the static magic method, however.

```php
Redis::connection('prod');
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

If anything goes wrong, Redis may return:

* a [CommandException](CommandException.md)
* a [ConnectionException](ConnectionException.md)


->getConfig($name)
----

Returns a Redis config. 


->getDefaultConnection()
----

Simply returs the string 'default'.