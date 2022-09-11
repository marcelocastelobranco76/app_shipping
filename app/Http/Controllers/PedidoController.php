<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

use Auth;
use Session;
Use DB;
Use Validator;
Use Input;
Use Redirect;
Use View;

class PedidoController extends Controller
{

	 public function __construct() {
        //$this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	public function listar(Request $request)
    {

	
	$pedidos = DB::table('orders')
    ->join('customers', 'orders.customer_id', '=', 'customers.id')
    ->select('customers.*', 'orders.*')->paginate(10);
	
        /**Carrega a visualização e mostra os pedidos **/
          return view('pedidos.listar', compact('pedidos'));
     

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */

  

}
