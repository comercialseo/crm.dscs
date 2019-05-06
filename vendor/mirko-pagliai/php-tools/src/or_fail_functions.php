<?php
/**
 * This file is part of php-tools.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright (c) Mirko Pagliai
 * @link        https://github.com/mirko-pagliai/php-tools
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 * @since       1.0.6
 */
use ErrorException as ErrorException;
use Exception as Exception;
use Tools\Exception\FileNotExistsException;
use Tools\Exception\KeyNotExistsException;
use Tools\Exception\NotDirectoryException;
use Tools\Exception\NotReadableException;
use Tools\Exception\NotWritableException;
use Tools\Exception\PropertyNotExistsException;

if (!function_exists('file_exists_or_fail')) {
    /**
     * Checks whether a file or directory exists and throws an exception if the
     *  file does not exist
     * @param string $filename Path to the file or directory
     * @param string $message The failure message that will be appended to the
     *  generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @throws FileNotExistsException
     */
    function file_exists_or_fail($filename, $message = 'File or directory `%s` does not exist', $exception = FileNotExistsException::class)
    {
        is_true_or_fail(file_exists($filename), sprintf($message, rtr($filename)), $exception);
    }
}

if (!function_exists('key_exists_or_fail')) {
    /**
     * Checks if the given key or index exists in the array and throws an
     *  exception if the key does not exist.
     *
     * If you pass an array of keys, they will all be checked.
     * @param string|int|array $key Key to check or an array of keys
     * @param array $array An array with keys to check
     * @param string|null $message The failure message that will be appended to
     *  the generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @throws KeyNotExistsException
     */
    function key_exists_or_fail($key, array $array, $message = 'Key `%s` does not exist', $exception = KeyNotExistsException::class)
    {
        foreach ((array)$key as $name) {
            is_true_or_fail(array_key_exists($name, $array), sprintf($message, $name), $exception);
        }
    }
}

if (!function_exists('property_exists_or_fail')) {
    /**
     * Checks if a property exists and throws an exception if the property does
     *  not exist.
     *
     * If the object has the `has()` method, it uses that method. Otherwise it
     *  use the `property_exists()` function.
     * @param object|string $object The class name or an object of the class to test for
     * @param string $property The name of the property
     * @param string|null $message The failure message that will be appended to
     *  the generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @since 1.1.14
     * @throws PropertyNotExistsException
     */
    function property_exists_or_fail($object, $property, $message = 'Object does not have `%s` property', $exception = PropertyNotExistsException::class)
    {
        foreach ((array)$property as $name) {
            $result = method_exists($object, 'has') ? $object->has($name) : property_exists($object, $name);
            is_true_or_fail($result, sprintf($message, $name), $exception);
        }
    }
}

if (!function_exists('is_dir_or_fail')) {
    /**
     * Tells whether the filename is a directory and throws an exception if the
     *  filename is not a directory
     * @param string $filename Path to the directory
     * @param string|null $message The failure message that will be appended to
     *  the generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @throws NotDirectoryException
     */
    function is_dir_or_fail($filename, $message = 'Filename `%s` is not a directory', $exception = NotDirectoryException::class)
    {
        is_true_or_fail(is_dir($filename), sprintf($message, rtr($filename)), $exception);
    }
}

if (!function_exists('is_readable_or_fail')) {
    /**
     * Tells whether a file exists and is readable and throws an exception if
     *  the file is not readable
     * @param string $filename Path to the file or directory
     * @param string|null $message The failure message that will be appended to
     *  the generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @throws NotReadableException
     */
    function is_readable_or_fail($filename, $message = 'File or directory `%s` is not readable', $exception = NotReadableException::class)
    {
        is_true_or_fail(is_readable($filename), sprintf($message, rtr($filename)), $exception);
    }
}

if (!function_exists('is_true_or_fail')) {
    /**
     * Throws an exception if the value is not equal to `true`.
     *
     * You can also pass the exception as a second parameter, instead of the
     *  message.
     * @param mixed $value The value you want to check
     * @param string|null $message The failure message that will be appended to the
     *  generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @since 1.1.7
     * @throws Exception
     */
    function is_true_or_fail($value, $message = 'The value is not equal to `true`', $exception = ErrorException::class)
    {
        if ($value) {
            return;
        }

        if (func_num_args() === 2 && is_string($message) && class_exists($message)) {
            $exception = new $message;
        } else {
            if (!is_string($exception)) {
                trigger_error('`$exception` parameter must be a string');
            }
            if (!class_exists($exception)) {
                trigger_error(sprintf('Class `%s` does not exist', $exception));
            }
            $exception = new $exception($message);
        }

        if (!$exception instanceof Exception) {
            trigger_error(sprintf('`%s` is not and instance of `Exception`', get_class($exception)));
        }

        throw $exception;
    }
}

if (!function_exists('is_writable_or_fail')) {
    /**
     * Tells whether the filename is writable and throws an exception if the
     *  file is not writable
     * @param string $filename Path to the file or directory
     * @param string|null $message The failure message that will be appended to
     *  the generated message
     * @param string $exception The exception class you want to set
     * @return void
     * @throws NotWritableException
     */
    function is_writable_or_fail($filename, $message = 'File or directory `%s` is not writable', $exception = NotWritableException::class)
    {
        is_true_or_fail(is_writable($filename), sprintf($message, rtr($filename)), $exception);
    }
}
