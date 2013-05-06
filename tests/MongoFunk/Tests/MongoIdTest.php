<?php

namespace MongoFunk\Tests;

class MongoIdTest extends \PHPUnit_Framework_TestCase
{
    public function testNewMongoId()
    {
        $id = new \MongoFunk\MongoId();
        $this->assertTrue($id instanceof \MongoId);
    }

    public function testMongoIdOfStrings()
    {
        $shortString = 'string';
        $shortId = new \MongoFunk\MongoId($shortString);
        $this->assertStringEndsNotWith($shortString, $shortId->__toString());

        $fullString = '00000000000000000000AAAA';
        $fullId = new \MongoFunk\MongoId($fullString);
        $this->assertStringEndsNotWith($fullString, $fullId->__toString());
    }

    public function testMongoIdCaps()
    {
        $string = '00000000000000000000AAAA';
        $id = new \MongoFunk\MongoId($string);
        $this->assertStringEndsNotWith($string, $id->{"\$id"}, "Mongo Id should convert passed id to lowercase");
    }

    public function testMongoIdMongoId()
    {
        $id = new \MongoId();
        $funkId = new \MongoFunk\MongoId($id);
        $this->assertSame($id->__toString(), $funkId->__toString(), "Mongo Id should return the passed id");
    }
}