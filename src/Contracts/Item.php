<?php

namespace Rende\NovaMenu\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface Item
{
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo;

    /**
     * Find a permission by its name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws Rende\NovaMenu\Exceptions\ItemDoesNotExist
     *
     * @return Item
     */
    public static function findByName(string $name, $guardName): self;

    /**
     * Find a permission by its id.
     *
     * @param int $id
     * @param string|null $guardName
     *
     * @throws Rende\NovaMenu\Exceptions\ItemDoesNotExist
     *
     * @return Item
     */
    public static function findById(int $id, $guardName): self;

    /**
     * Find or Create a permission by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return Item
     */
    public static function findOrCreate(string $name, $guardName): self;
}
