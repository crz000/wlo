<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;

use Storage;
use Flash;
use App\Models\Banco;

class BancoController extends Controller
{

    /**
     * Display a listing of the Banco.
     *
     * @return Response
     */

    public function index()
    {
        $bancos = Banco::paginate(10);

        return view('banco.index', compact('bancos'));
    }

    /**
     * Show the form for creating a new Banco.
     *
     * @return Response
     */
    public function create()
    {
        return view('banco.create');
    }

    /**
     * Store a newly created Banco in storage.
     *
     * @param CreateBancoRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Banco::create($input);
        
        Flash::success('Banco saved successfully.');
        
        return redirect(route('banco.index'));
    }

    /**
     * Show the specified Banco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banco = $this->exist($id);
        
        return view('banco.show')->with(compact('banco'));
    }

    /**
     * Show the form for editing the specified Banco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banco = $this->exist($id);
        
        return view('banco.edit')->with(compact('banco'));
    }

    /**
     * Update the specified Banco in storage.
     *
     * @param int $id
     * @param UpdateBancoRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $banco = $this->exist($id);

        $banco->fill($request->all());

        $banco->save();

        Flash::success('Banco updated successfully.');

        return redirect(route('banco.index'));
    }

    /**
     * Remove the specified Banco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banco = $this->exist($id);

        $banco->delete();

        Flash::success('Banco deleted successfully.');

        return redirect(route('banco.index'));
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
            $banco = Banco::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Banco not found');

            return redirect(route('banco.index'));
        }

        return $banco;
    }
}
