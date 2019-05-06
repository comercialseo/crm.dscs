# 1.x branch
## 1.2 branch
### 1.2.4
* fixed bug for `is_url()` global function, it correctly recognizes the url with
    brackets.

### 1.2.3
* fixed bug for `BodyParser::extractLinks()`, urls are returned without the
    trailing slash.

### 1.2.2
* fixed bug for `url_to_absolute()` global function.

### 1.2.1
* fixed bug for `is_url()` global function;
* fixed bug for `url_to_absolute()` global function.

### 1.2.0
* added `fileperms_as_octal()` and `fileperms_to_string()` global functions;
* arguments of the `assertFileMime()` assert method have been reversed
    (`$expectedMime, $filename, $message = ''`). If `$expectedMime` is an array,
    it asserts that the filename has at least one of those values;
* arguments of the `assertFilePerms()` assert method have been reverse
    (`$expectedPerms, $filename, $message = ''`);
* arguments of the `assertImageSize()` assert method have been reverse
    (`$expectedWidth, $expectedHeight, $filename, $message = ''`);
* for the `assertFileExtension()` assert method, if `$expectedMime` is an array,
    it asserts that the filename has at least one of those values;
* removed deprecated `ends_with()` and `starts_with()` global functions, use
    instead `string_ends_with()` and `string_starts_with()`;
* removed deprecated `first_key()`, `first_value()`, `first_value_recursive()`,
    `last_key()`, `last_value()` and `last_value_recursive()` global functions,
    use instead `array_key_first()`, `array_value_first()`,
    `array_value_first_recursive()`, `array_key_last()`, `array_value_last()` and
    `array_value_last_recursive()`;
* removed deprecated `is_win()` global function, use instead `IS_WIN` constant;
* removed deprecated `assertContainsInstanceOf()`, `assertFileExists()` and
    `assertFileNotExists()` assert methods;
* `assertFileExtension()`, `assertFileMime()` and `assertFilePerms()` methods now
    take a string as first `$filename` argument, so they no longer take an array.
    If you want to check an array of filename, use the `array_map()` function;  
* removed deprecated `TestCaseTrait`. Use `TestTrait` instead;
* removed deprecated `Apache` class;
* removed all deprecated "safe" functions;
* updated for phpunit 7.

## 1.1 branch
### 1.1.16
* added `url_to_absolute()` global function;
* removed `BodyParser::_turnUrlAsAbsolute()` and `BodyParser::isHtml()` methods.

### 1.1.15
* added `Entity` class.

### 1.1.14
* added `property_exists_or_fail()` global function and the
    `PropertyNotExistsException` exception class.

### 1.1.13
* added `array_clean()` global function;
* added `is_html()` global function. This also provides the `assertIsHtml()`
    assertion method for the `TestTrait`;
* `Apache` class is now deprecated and will be removed in a later version.

### 1.1.12
* added `is_iterable()` global function;
* `assertIsArray()`, `assertIsInt()`, `assertIsObject()` and `assertIsString()`
    methods of `TestTrait` are now provided by `__call()` and `__callStatic()`
    methods. These also provide some other "assertIs" methods (see API);
* `assertFileExtension()`, `assertFileMime()`, `assertFilePerms()` methods are
    deprecated when used with an array of filename and in a later version they
    will take a string as argument. `assertFileExists()` and `assertFileNotExists()`
    methods are deprecated and will be removed in a later version, because the
    same methods are provided by PHPUnit and take a string as argument;
* fixed bug for `assertException()` assert method, it checks if the
    `$expectedException` is a subclass of `Exception`;
* fixed bug for `assertIsArrayNotEmpty()` assert method, it executes
    `array_filter()` on the array to verify that it does not contain a value
    that is nevertheless equal to empty;
* `first_key()`, `last_key()`, `first_value()`, `first_value_recursive()`,
    `last_value()` and `last_value_recursive()` functions are now deprecated and
    will be removed in a later version. Use instead `array_key_first()`,
    `array_key_last()`, `array_value_first()`, `array_value_last(),
    `array_value_first_recursive()` and `array_value_last_recursive()`;
* `ends_with()` and `starts_with()` functions are now deprecated and will be removed
    in a later version. Use instead `string_ends_with()` and `string_starts_with()`.

### 1.1.11
* added `TestCase` class;
* added `objects_map()` global function;
* `assertFileExtension()` and `assertFileMime()` assert methods can take string
    or an array or a `Traversable` of files;
* all `ReflectionTrait` methods are now protected. The `setProperty()` method
    now returns the old value or `null`;
* `TestCaseTrait` is now deprecated and will be removed in a later version. Use
    `TestTrait` instead. The `createSomeFiles()` method has been removed and now
    it is a global function only for tests;
* fixed bug for `assertArrayKeysEqual()` and `assertSameMethods()` assert methods,
    the values are sorted alphabetically before being compared;
* fixed bug for `assertFilePerms()`. Now it works correctly and take permission
    values as string or octal value;
* fixed bug for `first_key()`, `first_value()`, `last_key()` and `last_value()`
    function: they return `null` with empty array;
* fixed bug for `is_url()` function with no-string values;
* `is_win()` method is now deprecated and will be
    removed in a later version; Use the `IS_WIN` constant instead;
* `assertContainsInstanceOf()` method is now deprecated and will be removed in a
    later version. Use `assertContainsOnlyInstancesOf()` instead';
* all "safe" methods are now deprecated and will be removed in a later version.

### 1.1.10
* added `first_key()`, `first_value_recursive()`, `last_key()` and
    `last_value_recursive()` global functions;
* added `key_exists_or_fail()` function.

### 1.1.9
* `file_exists_or_fail()`, `is_dir_or_fail()`, `is_readable_or_fail()` and
    `is_writable_or_fail()` functions now have `$message` as second argument and
    `$exception` as third argument.

### 1.1.8
* `create_tmp_file()` and `safe_create_tmp_file()` methods now accept a 
    directory as a second argument and a prefix as the third argument.

### 1.1.7
* added `is_true_or_fail()` and `deprecationWarning()` global functions;
* added `create_file()` and `create_tmp_file()` global functions and
    `safe_create_file()` and `safe_create_tmp_file()` safe functions;
* added `assertException()` assert method;
* added some exception classes;
* `file_exists_or_fail()`, `is_dir_or_fail()`, `is_readable_or_fail()` and
    `is_writable_or_fail()` functions now throw specific exception classes.

### 1.1.6
* added `ends_with()` and `starts_with()` global functions.

### 1.1.5
* fixed `clean_url()` function, added third parameter `$removeTrailingSlash`.

### 1.1.4
* added `ReflectionTrait::getProperties()` method.

### 1.1.3
* added `BodyParser` class.

### 1.1.2
* added `$removeWWW` optional parameter to `clean_url()` global function.

### 1.1.1
* added `first_value()` and `last_value()` global functions.

### 1.1.0
* added `assertContainsInstanceOf()` assertion method. Removed
    `assertInstanceOf()` (you can use the original method).

## 1.0 branch
### 1.0.10
* added `FileArray` class.

### 1.0.9
* added `assertFilePerms()` assertion method.

### 1.0.8
* fixed bug for `unlink_recursive()` method with symlinks under Windows;
* `unlink_recursive()` returns void.

### 1.0.7
* added `dir_tree()` and `is_writable_resursive()` global functions;
* added `unlink_recursive()` and `safe_unlink_recursive()` functions.

### 1.0.6
* added `rmdir_recursive()` and `safe_rmdir_recursive()` functions;
* added `file_exists_or_fail()`, `is_dir_or_fail()`, `is_readable_or_fail()` and
    `is_writable_or_fail()` "or fail" functions;
* added `assertIsArrayNotEmpty()` assertion method.

### 1.0.5
* added `safe_copy()` and `safe_unserialized()` safe aliases.

### 1.0.4
* added `safe_mkdir()`, `safe_rmdir()`, `safe_symlink()` and `safe_unlink()`
    safe aliases;
* added `is_external_url()` global function;
* added `assertIsInt()` assertion method.

### 1.0.3
* added `clean_url()` and `is_slash_term()` global functions.

### 1.0.2
* added `Tools\Apache` class with some methods;
* added `Tools\TestSuite\TestCaseTrait` with some assertion methods;
* added `get_class_short_name()` and `get_hostname_from_url()` global functions;
* fixed `rtr()` global function. It can also use the `ROOT` environment variable.

### 1.0.1
* added `get_child_methods()` global function.

### 1.0.0
* first release.
