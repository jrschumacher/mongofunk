<?php

namespace MongoFunk;

/**
 * MongoId
 *
 * Fixes the following funk
 *
 * - convert all string ids to lowercase (was funked up when converting to json)
 * - doesn't create new id if passed existing id (was an issue with prior versions of PECL Mongo)
 */
class MongoId extends \MongoId
{

    public function __construct($id = null)
    {
        // Convert all passed ids to lowercase string
        if(is_string($id))
        {
            $id = strtolower($id);
        }

        // Already a MongoId
        if($id instanceof \MongoId)
        {
            $id = $id->{"\$id"};
        }

        return parent::__construct($id);
    }

}