<?php

namespace App\Exception;

use App\Exception\ApiException;

class NotFoundException extends ApiException
{
    public function __construct($code = 404, $message = 'Page not found')
    {
        parent::__construct($code, $message);
    }
}
