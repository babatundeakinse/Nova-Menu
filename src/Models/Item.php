<?php

namespace Rende\NovaMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Rende\NovaMenu\Exceptions\ItemDoesNotExist;
use Rende\NovaMenu\Contracts\Item as ItemContract;

class Item extends Model implements ItemContract
{

}