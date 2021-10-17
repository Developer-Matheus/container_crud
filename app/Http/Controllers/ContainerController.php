<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContainerRequest;
use App\Models\Container;
use App\Models\Movement;
use App\Models\MovementType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainerController extends Controller
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
        $containers = $this->containerModel->all();
        $data = [
            'containers' => $containers
        ];
        return view('container.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContainerRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->containerModel->updateOrCreateContainer($request);
            DB::commit();
            return redirect()->route('containers.index')->with('alert-success', 'Container Cadastrado com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('containers.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = $this->containerModel->find($id);
        $data = ['container' => $container];
        return view('container.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(ContainerRequest $request, Container $container)
    {
        try {
            DB::beginTransaction();
            $this->containerModel->updateOrCreateContainer($request, $container->id);
            DB::commit();
            return redirect()->route('containers.index')->with('alert-success', 'Container Editado com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('containers.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->containerModel->find($id)->delete();
            DB::commit();
            return redirect()->route('containers.index')->with('alert-success', 'Container Excluído com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('containers.index')->with('alert-danger', 'Ocorreu um erro.');
        }
    }
}
