<?php
namespace App\Repository\Role;
use App\Repositories\EloquentRepository;
class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface
{
	public function getModel()
	{
		return \App\Role::class;
	}
}
