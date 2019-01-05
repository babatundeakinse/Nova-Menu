<?php

namespace Rende\NovaMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Rende\NovaMenu\Exceptions\MenuDoesNotExist;
use Rende\NovaMenu\Contracts\Menu as MenuContract;

class Menu extends Model implements MenuContract
{

}