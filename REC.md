# REPORT \ REC
This class record/collect all Reports which are set.

There is 2 ways how to work with this class:
1) **STATIC** collect all report action data in one GLOBAL array
1) **INSTANCE** collect all report action data only from `start()` to `end()`

<br>
<hr>
<br>

# STATIC PART

## ::add($rData)
- **$rData [[Report\rData](https://github.com/Zerig/report/blob/master/RDATA.md)]** 

Add instance of `rData` into GLOBAL array report

```php
\Report\Rec::add(new \Report\rData([
	"group" => "action",
	"state" => "fail",
	"msg"   => "This action failed.",
	"type"  => 0,
	"num"   => 1
]));

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
