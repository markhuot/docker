<?php namespace Illuminate\Redis;

/**
 * CommandException
 * ====
 *
 * A runtime exception to alert the developer to a bad Redis command. Maybe you
 * passed a number where you should have passed a string?
 */
class CommandException extends \RuntimeException {}