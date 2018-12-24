<?php

namespace App\Http\Controllers;

use App\Repositories\Role\RoleRepositoryInterface;

use Illuminate\Http\Request;

class RoleController extends Controller
{
	protected $roleRepository;

	public function __construct(RoleRepositoryInterface $roleRepository) {
		$this->roleRepository = $roleRepository;
	}

    public function getList() {
    	$roles = $this->roleRepository->getAll();
    	return view('admin.role.list', compact('roles'));
    }

    public function getUpdate($id) {
        $role = $this->roleRepository->find($id);
    	return view('admin.role.update', compact('role'));
    }
    public function postUpdate(Request $request, $id) {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên role',
                'name.min'=>'Tên phải có ít nhất 3 ký tự',
                'name.max'=>'Tên có nhiều nhất 100 ký tự'
            ]);
        $data = $request->all();
        $this->roleRepository->update($id,$data);
        return redirect('admin/role/update/'.$id)->with('alert','Bạn đã update thành công');
    }

     public function getCreate() {
    	return view('admin.role.create');
    }
    public function postCreate(Request $request) {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên role',
                'name.min'=>'Tên phải có ít nhất 3 ký tự',
                'name.max'=>'Tên có nhiều nhất 100 ký tự'
            ]);
    	$data = $request->all();
        $this->roleRepository->create($data);
        return redirect('admin/role/create')->with('alert','Bạn đã thêm thành công');
    }

    public function getDelete($id) {
        $this->roleRepository->delete($id);
        return redirect('admin/role/list')->with('alert','Bạn đã xóa người dùng thành công');
    }

}
