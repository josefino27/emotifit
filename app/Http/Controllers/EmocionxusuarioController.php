<?php

namespace App\Http\Controllers;

use App\Models\EmocionModel;
use App\Models\Emocionxusuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class EmocionxusuarioController
 * @package App\Http\Controllers
 */
class EmocionxusuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emocionxusuarios = Emocionxusuario::paginate();

        return view('emocionxusuario.index', compact('emocionxusuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $emocionxusuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emocionxusuario = new Emocionxusuario();
        $emociones = EmocionModel::pluck('nombre_emocion','id_emocion');
        $user = Auth::user();
return view('emocionxusuario.create', compact('emocionxusuario','emociones','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Emocionxusuario::$rules);

        $emocionxusuario = Emocionxusuario::create($request->all());

        return redirect()->route('emocionxusuarios.index')
            ->with('success', 'Emocionxusuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emocionxusuario = Emocionxusuario::find($id);

        return view('emocionxusuario.show', compact('emocionxusuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emocionxusuario = Emocionxusuario::find($id);
        $emociones = EmocionModel::pluck('nombre_emocion','id_emocion');
        $user = Auth::user();

        return view('emocionxusuario.edit', compact('emocionxusuario','emociones','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Emocionxusuario $emocionxusuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emocionxusuario $emocionxusuario)
    {
        request()->validate(Emocionxusuario::$rules);

        $emocionxusuario->update($request->all());

        return redirect()->route('emocionxusuarios.index')
            ->with('success', 'Emocionxusuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $emocionxusuario = Emocionxusuario::find($id)->delete();

        return redirect()->route('emocionxusuarios.index')
            ->with('success', 'Emocionxusuario deleted successfully');
    }
}
