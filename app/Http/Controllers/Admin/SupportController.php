<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view(
            'admin/supports/index',
            compact('supports')
        );
    }

    public function show(string|int $id, Support $support)
    {
        $support = $support->find($id);
        if (!$support) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view(
            'admin/supports/create'
        );
    }

    public function store(StoreUpdateSupportRequest $request, Support $support)
    {
        $request->validated();
        $data = $request->all();
        $data['status'] = 'a';
        $support = $support->create($data);
        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id)
    {
        $support = $support->where('id', $id)->first();
        if (!$support) {
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, Support $support, string|int $id)
    {
        $request->validated();
        $support = $support->find($id);
        if (!$support) {
            return back();
        }

        $support->update($request->only([
            'subject',
            'body'
        ]));

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id, Support $support)
    {
        $support = $support->find($id);
        if (!$support) {
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }
}
