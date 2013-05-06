<?php

namespace MongoFunk\Tests;

class MongoDateTest extends \PHPUnit_Framework_TestCase
{

    public function testSetAsDateTime()
    {
        $date = new \DateTime();
        $mdate = new \MongoFunk\MongoDate($date);
        $this->assertEquals($date->getTimestamp(), $mdate->sec, "MongoDate should return the time in seconds");
    }

    public function testGetAsDateTime()
    {
        $date = time();
        sleep(1);
        $mdate = new \MongoFunk\MongoDate($date);
        $this->assertTrue($mdate->getDateTime() instanceof \DateTime, "Should be instance of DateTime");
        $this->assertEquals($date, $mdate->getDateTime()->getTimestamp(), "Should be same as \$date");
    }

}