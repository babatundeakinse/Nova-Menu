<?php

namespace Rende\NovaMenu\Exceptions;

use InvalidArgumentException;

class ItemDoesNotExist extends InvalidArgumentException
{
    public static function create(string $roleName, string $guardName)
    {
        return new static("A role `{$roleName}` already exists for guard `{$guardName}`.");
    }
}
