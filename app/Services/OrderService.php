<?php

namespace App\Services;

use App\Models\{
    Product,
    ProductCategory,
    ProductGallery,
    ProductTag,
    ProductVariation,
    Order,
    OrderItems,
    OrderAddress
};
use DB;
use App\Services\{
	CommunicationService,
	UserService
};

class OrderService{
    protected $communicationService;
    protected $userService;
    public function __construct(
    	CommunicationService $communicationService,
    	UserService $userService
    ) {
        $this->communicationService = $communicationService;
        $this->userService = $userService;
    }
    public function store($request) {
    	DB::beginTransaction();
    	try {
	    	$userId = 0;
	    	if ($request->create_account) {
	    		$user = $this->userService->store($request);
	    		$userId = $user->user_id;
	    	} else {
	    		$userId = getCurrentUserByKey('user_id');
	    	}
		    $carts = session()->get('cart');
		    $totalPrice = 0;
		    foreach($carts as $itemId => $cart) {
		        $totalPrice += ($cart['quantity'] * $cart['price']);
		    }
	    	$order = new Order();
	    	$order->user_id = $userId;
	    	$order->sub_total_price = $totalPrice;
	    	$order->total_price = $totalPrice;
	    	$order->payment_method = 'NA';
	    	$order->order_number = 'ORD-' . str_pad($order->id, 6, '0', STR_PAD_LEFT);
	    	$order->created_at = dateTime();
	    	$order->updated_at = dateTime();
	    	$order->save();

	    	$order->order_number = 'ORD-' . str_pad($order->id, 6, '0', STR_PAD_LEFT);
	    	$order->save();
	    	$this->saveItems($order, $carts);
	    	$this->saveAddress($order, $request->billing, 'billing');
	    	$this->saveAddress($order, $request->billing, 'shipping');
	    	DB::commit();
	    	return $order;
	    } catch (Exception $e) {
	    	DB::rollBack();
	    	return null;
	    }
    }
    public function saveItems($order, $carts) {
    	foreach($carts as $itemId => $cart) {
	        $totalPrice = ($cart['quantity'] * $cart['price']);
    		$orderItem = new OrderItems();
    		$orderItem->order_id = $order->id;
    		$orderItem->product_id = $cart['product_id'];
    		$orderItem->product_name = $cart['product_name'];
    		$orderItem->product_image = $cart['product_image'];
    		$orderItem->product_variation_id = $cart['variation_id']??0;
    		$orderItem->variation_name = $cart['variation_name'];
    		$orderItem->quantity = $cart['quantity'];
    		$orderItem->price = $cart['price'];
    		$orderItem->total = $totalPrice;
    		$orderItem->created_at = dateTime();
	    	$orderItem->updated_at = dateTime();
	    	$orderItem->save();
    	}
    }
    public function saveAddress($order, $address, $type) {
    	OrderAddress::insert([
    		'order_id' => $order->id,
    		'address_type' => $type,
    		'address_line1' => $address['address_line1'],
    		'address_line2' => $address['address_line2'],
    		'city' => $address['city']??0,
    		'state' => $address['state'],
    		'postal_code' => $address['postal_code'],
    		'country' => $address['country'],
    		'phone_number' => Null,
    		'created_at' => dateTime(),
    		'updated_at' => dateTime()
    	]);
    }
}