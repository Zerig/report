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


## ::getDepth()
- **@returns [int]** number of current collect reports

Add instance of `rData` into GLOBAL array report

```php
\Report\Rec::getDapth()	=> 3

```
