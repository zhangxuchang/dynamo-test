<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/3
 * Time: 11:59
 */

namespace Vendor\DynamoTest\Items;

use Oasis\Mlib\ODM\Dynamodb\Annotations\Field;
use Oasis\Mlib\ODM\Dynamodb\Annotations\Item;

/**
 * Class User
 *
 * @package Vendor\DynamoTest\Items
 * @Item(table="users",
 *     primaryIndex={"uuid"}
 *     )
 */
class User
{
    /**
     * @var string
     * @Field(type="string")
     */
    private $uuid;
    /**
     * @var string
     * @Field(type="string")
     */
    private $name;
    /**
     * @var string
     * @Field(type="string")
     */
    private $address;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }
    
}
