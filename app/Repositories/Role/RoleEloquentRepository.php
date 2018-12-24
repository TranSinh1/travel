<?php
namespace App\Repositories\Role;

use App\Repositories\EloquentRepository;

use App\Repositories\Role\RoleRepositoryInterface;

class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface
{
	public function getModel()
	{
		return \App\Role::class;
	}
	
	public function getAllPublished() {
		$result = $this->_model->where('is_published', 1)->get();
		return $result;
	}

	public function findOnlyPublished() {
		$result = $this
		->_model
		->where('id', $id)
		->where('is_published', 1)
		->first();
		return $result;
	}

}
