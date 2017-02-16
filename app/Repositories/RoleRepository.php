<?php
namespace App\Repositories;
use App\Role;

class RolekRepository
{
    /**
     * Get all of the roles.
     *
     * @return Collection
     */
    public function any()
    {
        return Role::get();
    }
}
