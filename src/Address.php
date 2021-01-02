<?php
/*
* File:     Address.php
* Category: -
* Author:   M. Goldenbaum
* Created:  01.01.21 21:17
* Updated:  -
*
* Description:
*  -
*/

namespace Webklex\PHPIMAP;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Webklex\PHPIMAP\Exceptions\MaskNotFoundException;
use Webklex\PHPIMAP\Exceptions\MethodNotFoundException;
use Webklex\PHPIMAP\Support\Masks\AttachmentMask;

/**
 * Class Address
 *
 * @package Webklex\PHPIMAP
 */
class Address {

    /**
     * Address attributes
     * @var string $personal
     * @var string $mailbox
     * @var string $host
     * @var string $mail
     * @var string $full
     */
    public $personal = "";
    public $mailbox = "";
    public $host = "";
    public $mail = "";
    public $full = "";

    /**
     * Address constructor.
     * @param object   $object
     */
    public function __construct($object) {
        if (property_exists($object, "personal")){ $this->personal = $object->personal; }
        if (property_exists($object, "mailbox")){ $this->mailbox = $object->mailbox; }
        if (property_exists($object, "host")){ $this->host = $object->host; }
        if (property_exists($object, "mail")){ $this->mail = $object->mail; }
        if (property_exists($object, "full")){ $this->full = $object->full; }
    }


    /**
     * Return the stringified address
     *
     * @return string
     */
    public function __toString() {
        return $this->full;
    }

    /**
     * Return the serialized address
     *
     * @return array
     */
    public function __serialize(){
        return [
            "personal" => $this->personal,
            "mailbox" => $this->mailbox,
            "host" => $this->host,
            "mail" => $this->mail,
            "full" => $this->full,
        ];
    }
}