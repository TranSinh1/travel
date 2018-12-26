<?php

namespace App\Http\Controllers;

use App\Repositories\Paymethod\PaymethodRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PaymethodRequest;

class PaymethodController extends Controller
{
    protected $paymethodRepository;
    
    public function __construct(PaymethodRepositoryInterface $paymethodRepository)
    {
        $this->paymethodRepository = $paymethodRepository;
    }

    public function getList()
    {
        $paymethods = $this->paymethodRepository->getAll();

        return view('admin.paymethod.list', compact('paymethods'));
    }

    public function getUpdate($id)
    {
        $paymethod = $this->paymethodRepository->find($id);

        return view('admin.paymethod.update', compact('paymethod'));
    }

    public function postUpdate(PaymethodRequest $request, $id)
    {
        $data = $request->all();
        $this->paymethodRepository->update($id, $data);

        return redirect()->route('update.paymethod', [$id])->with('alert', 'Bạn đã sửa thành công');
    }

    public function getCreate()
    {
        return view('admin.paymethod.create');
    }

    public function postCreate(PaymethodRequest $request)
    {
        $data = $request->all();
        $this->paymethodRepository->create($data);

        return redirect()->route('create.paymethod')->with('alert', 'Bạn đã thêm thành công');
    }
    
    public function getDelete($id)
    {
        $this->paymethodRepository->delete($id);

        return redirect()->route('list.paymethod')->with('alert', 'Bạn đã xóa thành công');
    }
}
