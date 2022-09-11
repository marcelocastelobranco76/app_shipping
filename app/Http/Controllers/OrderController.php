<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $customer;
 
    public function __construct()
    {
        $this->customer = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customer
            ->orders()
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data
        $data = $request->only('delivery_date', 'freight_value','order_description');
        $validator = Validator::make($data, [
            'delivery_date' => 'required|string',
            'freight_value' => 'required',
            'order_description' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new order
        $order = $this->customer->orders()->create([
            'delivery_date' => $request->delivery_date,
            'freight_value' => $request->freight_value,
            'order_description' => $request->order_description,
            
        ]);

        //Order created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Pedido cadastrado com sucesso',
            'data' => $order
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->customer->orders()->find($id);
    
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pedido não encontrado.'
            ], 400);
        }
    
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

   
}