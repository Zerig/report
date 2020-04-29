# REPORT \ REC
This class record/collect all Reports which are set.

There is 2 ways how to work with this class:
1) **STATIC** collect all report action data in one GLOBAL array
1) **INSTANCE** collect all report action data only from `start()` to `end()`

## collect report data
```php
$GLOBALS["html_msg"] = "[%s] %m";

\Report\Rec::add(["state" => "fail", "msg" => "This action failed in global array."]);
\Report\Rec::add(["state" => "info", "msg" => "This action inform you in global array."]);

$my_rec->start();
\Report\Rec::add(["state" => "fail", "msg" => "This action failed in local."]);
\Report\Rec::add(["state" => "success", "msg" => "This action success in local."]);
\Report\Rec::add(["state" => "success", "msg" => "This action also success in local."]);
$my_rec->end()

\Report\Rec::add(["state" => "success", "msg" => "This action succes in global array."]);

```

## print report data
```php
// ALL what was collected GLOBALLY
\Report\Rec::get() => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in global array."]);
	[1] => Report\Rec(["state" => "info", "msg" => "This action inform you in global array."]);
	[2] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
	[3] => Report\Rec(["state" => "success", "msg" => "This action success in local."]);
	[4] => Report\Rec(["state" => "success", "msg" => "This action also success in local."]);
	[5] => Report\Rec(["state" => "success", "msg" => "This action succes in global array."]);
]

// ONLY what was collected LOCALY in '$my_rec'
$my_rec->get() => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
	[1] => Report\Rec(["state" => "success", "msg" => "This action success in local."]);
	[2] => Report\Rec(["state" => "success", "msg" => "This action also success in local."]);
]
// ONLY what was collected LOCALY in '$my_rec' and FAILED!!!
$my_rec->msg() => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
]
```
## HTML print report data
```php
// ALL what was collected GLOBALLY
\Report\Rec::getHtml() => [
	[0] => "[fail] This action failed in global array.",
	[1] => "[info] This action inform you in global array.",
	[2] => "[fail] This action failed in local.",
	[3] => "[success] This action success in local.",
	[4] => "[success] This action also success in local.",
	[5] => "[success] This action succes in global array."
]

// ONLY what was collected LOCALY in '$my_rec'
$my_rec->getHtml() => [
	[0] => "[fail] This action failed in local",
	[1] => "[success] This action success in local",
	[2] => "[success] This action also success in local"
]
// ONLY what was collected LOCALY in '$my_rec' and FAILED!!!
$my_rec->msgHtml() => [
	[0] => "[fail] This action failed in local"
]

```

<br>
<hr>
<br>

# GLOBAL RECORDING
## ::add($rData)
- **$rData [array / [Report\rData](https://github.com/Zerig/report/blob/master/RDATA.md)]**

Add instance of `rData` into **GLOBAL array report**
```php
// BOTH varian ary VALID ↓
\Report\Rec::add(new \Report\rData([
	"group" => "action",
	"state" => "fail",
	"msg"   => "This action failed.",
	"type"  => 0,
	"num"   => 1
]));


\Report\Rec::add([
	"group" => "action",
	"state" => "fail",
	"msg"   => "This action failed.",
	"type"  => 0,
	"num"   => 1
]);

```


## ::getDepth()
- **@returns [int]** number of current collect reports

Returns number of items in **GLOBAL array** reports
```php
// BOTH varian ary VALID ↓
\Report\Rec::add(new \Report\rData(["state" => "fail", "msg" => "This action failed."]));
\Report\Rec::add(["state" => "success", "msg" => "This action success."]);

\Report\Rec::getDepth() => 2

```


## ::exist()
- **@returns [boolean]** if GLOBAL array exist or not

Returns number of items in **GLOBAL array** reports
```php
\Report\Rec::exist() => 0

\Report\Rec::add(["state" => "fail", "msg" => "This action failed."]);
\Report\Rec::add(["state" => "success", "msg" => "This action success."]);

\Report\Rec::exist() => 1

```

<br>
<hr>
<br>

# LOCAL RECORDING
## start($success = null)
- **$success [array / [Report\rData](https://github.com/Zerig/report/blob/master/RDATA.md)]** what will be shown if all report success

From `start()` also begins collecting record **locally**. Globals still continue!

## end()
Collectin continue until `end()`. You have to end it, or you cannot get local data!

```php
\Report\Rec::add(["state" => "fail", "msg" => "This action failed in global array."]);
$my_rec->start(["state" => "success", "msg"   => "Every action success"]);
\Report\Rec::add(["state" => "fail", "msg" => "This action failed in local."]);
\Report\Rec::add(["state" => "success", "msg" => "This action success in local."]);
$my_rec->end()
```

```php
\Report\Rec::getHtml() => [
	[0] => "[fail] This action failed in global array.",
	[1] => "[fail] This action failed in local.",
	[2] => "[success] This action success in local."
]

// ONLY what was collected LOCALY in '$my_rec'
$my_rec->getHtml() => [
	[0] => "[fail] This action failed in local.",
	[1] => "[success] This action success in local."
]
```

<br>
<hr>
<br>

# PRINT RECORDING

```php
$GLOBALS["html_msg"] = "[%s] %m";

\Report\Rec::add(["state" => "fail", "msg" => "This action failed in global array."]);
\Report\Rec::add(["state" => "info", "msg" => "This action inform you in global array."]);

$my_rec->start();
\Report\Rec::add(["state" => "fail", "msg" => "This action failed in local."]);
\Report\Rec::add(["state" => "success", "msg" => "This action success in local."]);
\Report\Rec::add(["state" => "success", "msg" => "This action also success in local."]);
$my_rec->end()

\Report\Rec::add(["state" => "success", "msg" => "This action succes in global array."]);

```

## get($i = null)
- **$i [num]** id of item you want

Returns all records. Depends if you use it **GLOBALLY** or **LOCALLY**.
### GLOBAL RECORDS - all records
```php
\Report\Rec::get(0)  => Report\Rec(["state" => "fail", "msg" => "This action failed in global array."])
\Report\Rec::get(1)  => Report\Rec(["state" => "info", "msg" => "This action inform you in global array."])
\Report\Rec::get(-1) => Report\Rec(["state" => "success", "msg" => "This action succes in global array."])
\Report\Rec::get()   => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in global array."]);
	[1] => Report\Rec(["state" => "info", "msg" => "This action inform you in global array."]);
	[2] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
	[3] => Report\Rec(["state" => "success", "msg" => "This action success in local."]);
	[4] => Report\Rec(["state" => "success", "msg" => "This action also success in local."]);
	[5] => Report\Rec(["state" => "success", "msg" => "This action succes in global array."]);
]
```
### LOCAL RECORDS - records from `start()` to `end()`
```php
$my_rec->get(0)  => Report\Rec(["state" => "fail", "msg" => "This action failed in local."])
$my_rec->get(1)  => Report\Rec(["state" => "success", "msg" => "This action success in local."])
$my_rec->get(-1) => Report\Rec(["state" => "success", "msg" => "This action also success in local."])
$my_rec->get()   => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
	[1] => Report\Rec(["state" => "success", "msg" => "This action success in local."]);
	[2] => Report\Rec(["state" => "success", "msg" => "This action also success in local."]);
]
```



## msg()
return only whole array which **FAILED**. Depends if you use it **GLOBALLY** or **LOCALLY**.
### GLOBAL RECORDS - all records
```php
\Report\Rec::msg()   => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in global array."]);
	[1] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
]
```
### LOCAL RECORDS - records from `start()` to `end()`
```php
$my_rec->msg()   => [
	[0] => Report\Rec(["state" => "fail", "msg" => "This action failed in local."]);
]
```





# HTML PRINT RECORDING
Html print use what you save in this GLOBAL variable.
- `'%g'` where will be `$group` variable
- `'%s'` where will be `$state` variable
- `'%m'` where will be `$msg` variable
- `'%t'` where will be `$type` variable
- `'%n'` where will be `$num` variable
```php
$GLOBALS["html_msg"] = "[%s] %m";
```

## getHtml($i = null)
- **$i [num]** id of item you want

Returns all records. Depends if you use it **GLOBALLY** or **LOCALLY**.
### GLOBAL RECORDS - all records
```php
\Report\Rec::get(0)  => "[fail] This action failed in global array."
\Report\Rec::get()   => "
[fail] This action failed in global array.
[info] This action inform you in global array.
[fail] This action failed in local.
[success] This action success in local.
[success] This action also success in local.
[success] This action succes in global array.
";
```
### LOCAL RECORDS - records from `start()` to `end()`
```php
$my_rec->get(0)  => "[fail] This action failed in local."
$my_rec->get()   => "
[fail] This action failed in local.
[success] This action success in local.
[success] This action also success in local.
";
```



## msgHtml()
return only whole array which **FAILED**. Depends if you use it **GLOBALLY** or **LOCALLY**.
### GLOBAL RECORDS - all records
```php
\Report\Rec::msgHtml()   => "
[fail] This action failed in global array.
[fail] This action failed in local.
";
```
### LOCAL RECORDS - records from `start()` to `end()`
```php
$my_rec->msgHtml()   => "
[fail] This action failed in local
"
```
