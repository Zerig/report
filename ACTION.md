# REPORT \ ACTION
It is parent class of all Report groups (mysql, file, form,...)\n
There is 2 ways how to work with this class:
1) **STATIC** collect all report action data in one GLOBAL array
1) **CONSTRUCT** collect all report action data only from `start()` to `end()`


## ::set($group, $state, $type = 0, $num = 0)
- **$group [string]** "mysql", "file", "form",...
- **$styte [string]** "success", "info", "fail"
- **$type [string]** "1062", "insert", "move"
- **$num [int]** how many items were in action
All collecting do **static** part by method **set**. This collect data everywhere it is.

```php
\Report\Action::set("action", "fail")

```
```php
public $depth;		//
public $data = [];
public $success;

```



## ::mysql($sql)
collect information about sql activity.
```php
\Console\Log::mysql("
	SELECT *
	FROM table
");
```

## ::include($page_name)
collect information about page include.
```php
\Console\Log::include("index.php");
```
