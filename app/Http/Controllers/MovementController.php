<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovementRequest;
use App\Models\Container;
use App\Models\Movement;
use App\Models\MovementType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function __construct(
        Movement $movementModel,
        MovementType $movementTypeModel,
        Container $containerModel
    ) {
        $this->containerModel = $containerModel;
        $this->movementTypeModel = $movementTypeModel;
        $this->movementModel = $movementModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movements = $this->movementModel->all();
        $data = [
            'movements' => $movements
        ];
        return view('movement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $containers = $this->containerModel->all();
        $movementTypes = $this->movementTypeModel->all();

        $data = [
            'containers' => $containers,
            'movementTypes' => $movementTypes

        ];
        return view('movement.register', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovementRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->movementModel->updateOrCreateMovement($request);
            DB::commit();
            return redirect()->route('movements.index')->with('alert-success', 'Movimentação Cadastrada com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('movements.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movement = $this->movementModel->find($id);
        $data = ['movement' => $movement];
        return view('movement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function update(MovementRequest $request, Movement $movement)
    {
        try {
            DB::beginTransaction();
            $this->movementModel->updateOrCreateMovement($request);
            DB::commit();
            return redirect()->route('movements.index')->with('alert-success', 'Movimentação Editado com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('movements.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->movementModel->find($id)->delete();
            DB::commit();
            return redirect()->route('movements.index')->with('alert-success', 'Movimentação Excluida com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('movements.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }
}
