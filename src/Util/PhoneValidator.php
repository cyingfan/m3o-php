<?php
declare(strict_types=1);

namespace M3O\Util;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class PhoneValidator
{
    private PhoneNumberUtil $phoneUtil;

    public function __construct()
    {
        $this->phoneUtil = PhoneNumberUtil::getInstance();
    }

    public function validatePhone(string $phone): bool
    {
        try {
            $phoneNumber = $this->phoneUtil->parse($phone);
        } catch (NumberParseException $e) {
            return false;
        }
        return $this->phoneUtil->isValidNumber($phoneNumber);
    }
}