<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    protected $userRepository;
    public $up;

    public function __construct(UserRepositoryInterface $userRepository)
    {
		$this->userRepository = $userRepository;
        $this->upload = new UploadController;
    }

    public function getList()
    {
    	$users = $this->userRepository->getAll();

    	return view('admin.user.list', compact('users'));
    }

    public function getUpdate($id)
    {
        $user = $this->userRepository->find($id);
        $role = Role::all()->pluck('name', 'id');

       return view('admin.user.update', compact('user', 'role'));
    }

    public function postUpdate(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->find($id);
        $avatar_old = $user->avatar;
        $img = $request->avatar;
        if ($request->hasFile('avatar')) {
            $tail = $img->getClientOriginalExtension();
            $request->validate([
                'avatar' => 'image'
            ]);
            if (file_exists('upload/avatar/' . $avatar_old)) {
                unlink('upload/avatar/' . $avatar_old);
            }
            if ($tail == "png" || $tail == "jpg" || $tail == "jpeg") {

                $avatar = $this->upload->nameAvatar($img);
                $this->upload->uploadAvatar($img, $avatar);
                $name = $request->name;
                $role_id = $request->role_id;
                $email = $request->email;
                $this->userRepository->update($id, ['name' => $name, 'avatar' => $avatar, 'role_id' => $role_id]);
            if ($request->changePassword=="on") {
            $this->validate($request,
            [
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Password phải có ít nhất 3 ký tự',
                'password.max'=>'Password có nhiều nhất 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại password',
                'passwordAgain.same'=>'Nhập lại password không chính xác'
            ]);
            $password = bcrypt($request->password);
            $role_id = $request->role_id;
            $email = $request->email;
            $this->userRepository->update($id, ['avatar' => $avatar, 'password' => $password, 'name' => $name, 'role_id' => $role_id, 'email' => $email]);
            }
        }

        } else {
            $name = $request->name;
            $role_id = $request->role_id;
            $this->userRepository->update($id, ['name' => $name,'role_id' => $role_id]);
            
        }
        
        if ($request->changePassword=="on") {
            $this->validate($request,
            [
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Password phải có ít nhất 3 ký tự',
                'password.max'=>'Password có nhiều nhất 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại password',
                'passwordAgain.same'=>'Nhập lại password không chính xác'
            ]);
            $password = bcrypt($request->password);
            $role_id = $request->role_id;
            $email = $request->email;
            $this->userRepository->update($id, ['password' => $password, 'name' => $name, 'role_id' => $role_id, 'email' => $email]);
        }

       return redirect()->route('update.user', [$id])->with('alert', 'Bạn đã sửa thành công user');

    }

    public function getCreate()
    {
         $role = Role::all()->pluck('name', 'id');

        return view('admin.user.create', compact('role'));
    }

    public function postCreate(UserRequest $request)
    {
        $img = $request->avatar;
        if ($request->hasFile('avatar'))
        {
            $tail = $img->getClientOriginalExtension();
            $request->validate([
                'avatar' => 'image'
            ]);
            if ($tail == "png" || $tail == "jpg" || $tail == "jpeg")
            {
                $avatar = $this->upload->nameAvatar($img);
                $this->upload->uploadAvatar($img, $avatar);
                $name = $request->name;
                $role_id = $request->role_id;
                $email = $request->email;
                $password = bcrypt($request->password);
                $this->userRepository->create(['name' => $name, 'role_id' => $role_id, 'email' => $email, 'password' => $password , 'avatar' => $avatar]);
            }
        } 
        else
        {
            $name = $request->name;
            $role_id = $request->role_id;
            $email = $request->email;
            $password = bcrypt($request->password);
            $this->userRepository->create(['name' => $name, 'email' => $email, 'password' => $password, 'role_id' => $role_id]);
        }

        return redirect()->route('create.user')->with('alert', 'Bạn đã thêm thành công user');
    }

    public function getDelete($id)
    {
        $user = $this->userRepository->find($id);
        if (isset($user->avatar))
        {
            if (file_exists('upload/avatar/'.$user->avatar))
            {
                unlink('upload/avatar/'.$user->avatar);
            }
        }
        $this->userRepository->delete($id);

        return redirect()->route('list.user')->with('alert', 'Bạn đã xóa thành công user');
    }
}
