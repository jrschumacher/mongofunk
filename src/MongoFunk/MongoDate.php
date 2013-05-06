<?php

namespace MongoFunk;

/**
 * MongoDate
 *
 * Fixes the following funk
 *
 * - new from DateTime object
 * - returning as DateTime
 */
class MongoDate extends \MongoDate
{

    public function __construct($date = null)
    {
        if($date instanceof \DateTime)
        {
            $date = $date->getTimestamp();
        }

        parent::__construct($date);
    }

    public function getDateTime()
    {
        $dateTime = new \DateTime();
        $dateTime->setTimestamp($this->sec);
        return $dateTime;
    }

}