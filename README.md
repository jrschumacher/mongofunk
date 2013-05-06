MongoFunk
=========

[![Build Status](https://secure.travis-ci.org/jrschumacher/mongofunk.png?branch=master)](http://travis-ci.org/jrschumacher/mongofunk)

> Fixin' the funk out of Mongo classes.

Some of the Mongo classes act a little funky. This library intends to fix those.

## MongoId

### Capitalization Funk

If you pass a capitalized string to MongoId it will store your string

```
$id = new MongoId("00000000000000000000AAAA");

var_dump($id);

/*
object (
  "$id" => "00000000000000000000AAAA"
)
*/
```

Now what happens if print it? Funk.
```
print $id; // 00000000000000000000aaaa
```

And what about comparing? Funk.
```
$id == 00000000000000000000AAAA // FALSE
```

#### Defunked
As soon as the string is passed we `strtolower` it. Defunked.

_Why don't you just output the passed format?_ Well that has some issue with consistency in the database.
This way I am hoping most of the bases are covered, but will need to do some further tests.

## MongoDate

### DateTime Funk

Per the documentation you need to pass an integer which represents a Unix timestamp or microtimestamp.
This is understandable except DateTime is much more powerful and from the OO perspective a much better
solution than timestamps.

#### Defunked

You can now pass DateTime objects to MongoDate.

```
$date = new DateTime();
$mdate = new MongoDate($date);
$date->getTimestamp() == $mdate->sec; // TRUE
```

You can also get a DateTime from MongoDate object
```
$mdate->getDateTime(); // returns DateTime instance
```

## More

From my expierience that is the main frustrations, but more can be added.


