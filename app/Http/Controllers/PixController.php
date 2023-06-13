<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePixRequest;
use App\Http\Requests\UpdatePixRequest;
use App\Models\Pix;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use function App\Helpers\selectionPixTypes;

class PixController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Pix::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pixes = Pix::all();

        $pixes = collect($pixes)->map(function ($pix) {
            $pix['can_update'] = auth()->user()->can('update', $pix);
            $pix['can_delete'] = auth()->user()->can('delete', $pix);
            return $pix;
        }, $pixes);

        return Inertia::render('Pixes/Index', [
            'pixes' => $pixes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keyTypes = selectionPixTypes();

        return Inertia::render('Pixes/Create', [
            'keyTypes' => $keyTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePixRequest $request)
    {
        $pix = Pix::create($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O pix foi cadastrado com sucesso.'
        ]);

        return Redirect::route('pixes.show', $pix);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pix $pix)
    {
        $keyTypes = selectionPixTypes();

        $pix['can_update'] = auth()->user()->can('update', $pix);
        $pix['can_delete'] = auth()->user()->can('delete', $pix);

        return Inertia::render('Pixes/Show', [
            'pix' => $pix,
            'keyTypes' => $keyTypes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pix $pix)
    {
        $keyTypes = selectionPixTypes();

        return Inertia::render('Pixes/Edit', [
            'pix' => $pix,
            'keyTypes' => $keyTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePixRequest $request, Pix $pix)
    {
        $pix->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O pix foi atualizado com sucesso.'
        ]);

        return Redirect::route('pixes.show', $pix);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pix $pix)
    {
        $pix->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O pix foi deletado com sucesso.'
        ]);

        return Redirect::route('pixes.index');
    }
}
