<?php
namespace App\Services\Order;

use App\Helpers\Currency;
use Carbon\Carbon;
use App\Helpers\Weeks;
use App\Models\Order;
use App\Repository\OrderRepository;
use Illuminate\Support\Facades\Date;

class Orders
{    
    /**
     * Retorna os pedidos feitos entre duas datas informadas.
     *
     * @param Carbon $dateInit Data inicial do range de datas.
     * @param Carbon $dateEnd Data final do range de datas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    /**
     * Retorna os pedidos ativos feitos entre duas datas informadas.
     *
     * @param Carbon $dateInit Data inicial do range de datas.
     * @param Carbon $dateEnd Data final do range de datas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDashboardOrders(
        Carbon $dateInit, 
        Carbon $dateEnd
    ) {
        $orders = OrderRepository::getDashboardOrders($dateInit, $dateEnd);
        return $orders;
    }

    public function changeOrderStatus(int $orderId, string $orderStatus)
    {
        $orderChangeMessages = [];
        switch($orderStatus){
            case 'P':                
                break;
            case 'A':
                $orderChangeMessages = [
                    'success' => 'Pedido aceito com sucesso.',
                    'error' => 'Impossivel aceitar o pedido, ocorreu um erro inesperado.'
                ];
                break;
            case 'R':
                $orderChangeMessages = [
                    'success' => 'Pedido rejeitado com sucesso.',
                    'error' => 'Impossivel rejeitar o pedido, ocorreu um erro inesperado.'
                ];
                break;
            case 'C':
                $orderChangeMessages = [
                    'success' => 'Pedido cancelado com sucesso.',
                    'error' => 'Impossivel cancelar o pedido, ocorreu um erro inesperado.'
                ];
                break;
            case 'I':
                $orderChangeMessages = [
                    'success' => 'Pedido enviado para a cozinha com sucesso.',
                    'error' => 'Impossivel enviar o pedido para a cozinha, ocorreu um erro inesperado.'
                ];
                break;
            case 'F':
                $orderChangeMessages = [
                    'success' => 'Pedido finalizado com sucesso.',
                    'error' => 'Impossivel finalizar o pedido.',
                ];
                break;
            case 'D':
                $orderChangeMessages = [
                    'success' => 'Pedido liberado para o motoboy com sucesso.',
                    'error' => 'Impossivel liberar o pedido para o motoboy.',
                ];
                break;
            case 'E':
                $orderChangeMessages = [
                    'success' => 'Pedido entregue com sucesso.',
                    'error' => 'Impossivel entregar o pedido.',
                ];
                break;
        }
        
        try {
            Order::where('id', $orderId)->update([
                'order_status' => $orderStatus
            ]);

            return [
                'msg' => $orderChangeMessages['success'],
                'data' => [],
                'status' => 200
            ];
        } catch (\Throwable $th) {
            throw new \Exception(
                $orderChangeMessages['error'],
                500
            );
        }
    }

    public function getOrderDetails(int $orderId)
    {
        try {
            $objOrder = OrderRepository::getFullOrder($orderId);
            if ($objOrder) {
                $objOrder->payment_method_description = $objOrder->order_payment_method->description();
            }

            $arOrder = $objOrder->toArray();

            foreach ($arOrder['order_products'] as &$order) {
                $order['order_product_value_real'] = Currency::convertCentsToReal($order['order_product_value']);
            }

            if($arOrder['order_payment_method'] == 'D') {
                $arOrder['order_change_value_real'] = Currency::convertCentsToReal($arOrder['order_change_value']);
            }
            if ($arOrder['order_value_total']) {
                $arOrder['order_value_total_real'] = Currency::convertCentsToReal($arOrder['order_value_total']);
            }
            if ($arOrder['order_value_subtotal']) {
                $arOrder['order_value_subtotal_real'] = Currency::convertCentsToReal($arOrder['order_value_subtotal']);
            }

            return $arOrder;
        } catch (\Throwable $th) {
            throw new \Exception(
                'Impossivel carregar os detalhes do pedido, ocorreu um erro inesperado.',
                500
            );
        }
    }

    public function getCancelledOrders()
    {
        try {
            $cancelledOrders = OrderRepository::getCancelledOrders();
            return [
                'orders' => $cancelledOrders,
                'count' => $cancelledOrders->count(),
                'valueSum' => $cancelledOrders->sum('order_value_total')
            ];
        } catch (\Throwable $th) {
            throw new \Exception(
                'Impossível carregar os pedidos cancelados, ocorreu um erro inesperado.',
                500
            );
        }
    }

    public function getBillingsToday(): string
    {
        try {
            return OrderRepository::getBillingsToday();
        } catch (\Throwable $th) {
            throw new \Exception(
                'Impossível carregar as vendas de hoje, ocorreu um erro inesperado.',
                500
            );
        }
    }

    public function getBillingsMonth(): string
    {
        try {
            return OrderRepository::getBillingsMonth();
        } catch (\Throwable $th) {
            throw new \Exception(
                'Impossível carregar as vendas do mes, ocorreu um erro inesperado.',
                500
            );
        }
    }
}