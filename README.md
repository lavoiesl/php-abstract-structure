# PHP Abstract Structures

Inspired from https://medium.com/laravel-4/ef6b7113dd40

Basic data structure with public properties while validating data type.

## Usage

### Generic structure

Each property will the bind to the type of the first value that is set.

```php
<?php
use Lavoiesl\AbstractStructure\AbstractStructure;

class Generic extends AbstractStructure
{
    protected $foo;
}

$generic = new Generic;
$generic->foo = 1; // initial value
$generic->foo = 2; // type not changing, still good
$generic->foo = 'foo'; // Exception, wrong type
$generic->bar = 'foo'; // Exception, undefined
?>
```

### Defined types

You may override `getPropertyType` for more granular control.

```php
<?php
use Lavoiesl\AbstractStructure\AbstractStructure;

class Article extends AbstractStructure
{
    protected $id;

    public function getPropertyType($property)
    {
        switch ($property) {
            case 'id': return 'integer|null';
        }
    }
}

$generic = new Article;
$generic->id = 1;
$generic->id = null;
$generic->id = 'foo'; // Exception
?>
```

## TODO

Consider adding readonly properties

## Author

 * [Sébastien Lavoie](http://blog.lavoie.sl/)
 * [WeMakeCustom](http://www.wemakecustom.com/)