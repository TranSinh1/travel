<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class AjaxController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
		$this->userRepository = $userRepository;
    }

    public function Delete()
    {
    	$users = $this->userRepository->getAll();
    	foreach ($users as $u) {
    		echo "<tr class ="."'odd gradeX'". "align"."="."'center'". "id"."="."'row'".">".
                    "<td>".{{$u->id}}."</td>"
                    "<td>".{{$u->name}}."</td>"
                    "<td>".{{$u->email}}."</td>"
                    "<td>".{{$u->role->name}}."</td>"
                    "<td>".{{$u->avarta}}."</td>"
                    "<td class="."'center'"."><i class="."'fa fa-trash-o  fa-fw'"."></i><a href"."="."'admin/user/delete/{{$u->id}}'". "onclick="."'return window.confirm('Are you sure?');'". "id="."'delete'".">"."Delete"."</a></td>"
                    "<td class="."'center'"."><i class="."'fa fa-pencil fa-fw'"."></i> <a href="."'admin/user/update/{{$u->id}}'".">Edit</a></td>"
                "</tr>";
        }
    }
}
