<?php

namespace Rende\NovaMenu\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Menu
{
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany;

    /**
     * Find a permission by its name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws Rende\NovaMenu\Exceptions\PermissionDoesNotExist
     *
     * @return Menu
     */
    public static function findByName(string $name, $guardName): self;

    /**
     * Find a permission by its id.
     *
     * @param int $id
     * @param string|null $guardName
     *
     * @throws Rende\NovaMenu\Exceptions\PermissionDoesNotExist
     *
     * @return Menu
     */
    public static function findById(int $id, $guardName): self;

    /**
     * Find or Create a permission by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return Menu
     */
    public static function findOrCreate(string $name, $guardName): self;
}
