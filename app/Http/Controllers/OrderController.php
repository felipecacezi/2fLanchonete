<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Helpers\Currency;
use App\Models\OrderProduct;
use App\Helpers\OrderHashing;
use App\Helpers\CalculateOrder;
use App\Helpers\OrderStatusColor;
use App\Repository\OrderRepository;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $request->validated();

            $arOrder = $request->all();

            $orderHash = new OrderHashing(
                $arOrder['order']['order_client_register'],
                $arOrder['order']['order_zipcode'],
                $arOrder['order']['order_whatsapp']
            );
            $arOrder['order']['order_hash'] = $orderHash->getHash($arOrder);

            $orderValues = new CalculateOrder($arOrder['products']);
            $orderValues->calculate();
            $arOrder['order']['order_value_total'] = $orderValues->getOrderTotal();
            $arOrder['order']['order_value_subtotal'] = $orderValues->getOrderTotal();
            $arOrder['order']['order_value_taxes'] = $orderValues->getTaxesTotal();
            $arOrder['products'] = $orderValues->getProducts();
            
            $currency = new Currency();
            $arOrder['order']['order_change_value'] = $currency->convertRealToCents($arOrder['order']['order_change_value'] ?? 0);
            $idOrder = Order::create($arOrder['order'])->id;
            

            foreach ($arOrder['products'] as $productId => &$product) {
                $product['order_id'] = $idOrder;
                OrderProduct::create($product);
            }
            
            return response(
                [
                    'msg' => 'Pedido feito com sucesso',
                    'data' => [
                        'link' => '/order/status/'.$arOrder["order"]["order_hash"]
                    ],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um erro ao fazer o pedido.",
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, string $hash)
    {
        $arOrder = OrderRepository::findByHash($hash);
        $orderStatusColor = new OrderStatusColor($arOrder[0]->order_status->original());
        $orderColor = $orderStatusColor->getOrderStatus();
        return view('orderStatus', compact('arOrder', 'orderColor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            $request->validated();
            $order->update($request->all());
            return response(
                [
                    'msg' => 'Pedido alterado com sucesso.',
                    'data' => [],
                    'status' => 200
                ],
                200,                
            );
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um erro ao alterar o pedido.",
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
