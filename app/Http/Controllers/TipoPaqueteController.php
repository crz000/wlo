<?php 

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Flash;
use Illuminate\Http\Request;
use App\Models\TipoPaquete;

class TipoPaqueteController extends Controller
{

    /**
     * Display a listing of the TipoPaquete.
     *
     * @return Response
     */
    public function index()
    {
        $tipoPaquetes = TipoPaquete::paginate(10);

        return view('tipo_paquete.index', compact('tipoPaquetes'));
    }

    /**
     * Show the form for creating a new TipoPaquete.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_paquete.create');
    }

    /**
     * Store a newly created TipoPaquete in storage.
     *
     * @param CreateTipoPaqueteRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        TipoPaquete::create($input);
        
        Flash::success('TipoPaquete saved successfully.');
        
        return redirect(route('tipo-paquete.index'));
    }

    /**
     * Show the specified TipoPaquete.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPaquete = $this->exist($id);
        
        return view('tipo_paquete.show')->with(compact('tipoPaquete'));
    }

    /**
     * Show the form for editing the specified TipoPaquete.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPaquete = $this->exist($id);
        
        return view('tipo_paquete.edit')->with(compact('tipoPaquete'));
    }

    /**
     * Update the specified TipoPaquete in storage.
     *
     * @param int $id
     * @param UpdateTipoPaqueteRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $tipoPaquete = $this->exist($id);

        $tipoPaquete->fill($request->all());

        $tipoPaquete->save();

        Flash::success('TipoPaquete updated successfully.');

        return redirect(route('tipo-paquete.index'));
    }

    /**
     * Remove the specified TipoPaquete from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPaquete = $this->exist($id);

        $tipoPaquete->delete();

        Flash::success('TipoPaquete deleted successfully.');

        return redirect(route('tipo-paquete.index'));
    }

    /**
     * check if a record exist
     *
     * @param  int $id
     * @return Eloquent
     */
    private function exist($id)
    {
        try {
            $tipoPaquete = TipoPaquete::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('TipoPaquete not found');

            return redirect(route('tipo-paquete.index'));
        }

        return $tipoPaquete;
    }
}
