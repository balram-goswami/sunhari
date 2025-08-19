<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Product,
    ProductVariation,
    SubVariation
};
use Validator, Session;
use App\Services\{
    CommonService
};

class CartController extends Controller
{
    protected $commonService;
    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $variation = $request->variation_id ? ProductVariation::findOrFail($request->variation_id) : null;

        $cart = Session::get('cart', []);

        $itemId = $product->id . ($variation ? "-" . $variation->id : "");
        if ($variation) {
            $variationRaw = maybe_decode($variation->variation_raw);
            $variationNames = [];
            if ($variationRaw) {
                foreach ($variationRaw as $key => $value) {
                    $variationNames[] = SubVariation::where('id', $value)->select('name')->get()->pluck('name')->first();
                }
            }
        }
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $request->quantity;
        } else {
            $cart[$itemId] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_image' => asset($product->image),
                'variation_id' => $variation ? $variation->id : null,
                'variation_name' => $variation ? implode(' - ', $variationNames) : null,
                'price' => $variation ? getVariationPrice($variation) : getProductPrice($product),
                'quantity' => $request->quantity,
            ];
        }

        Session::put('cart', $cart);
        Session::flash('success', 'Product add to cart');
        if ($request->action == 'add_to_cart') {
            return redirect()->back();
        }
        return redirect()->route('cart.checkout');
    }

    public function removeFromCart($itemId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            Session::put('cart', $cart);
        }

        Session::flash('success', 'Product removed from cart');
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);
        if ($request->cartItems) {
            foreach ($request->cartItems as $itemId => $quantity) {
                if (isset($cart[$itemId])) {
                    $cart[$itemId]['quantity'] = $quantity;
                }
            }
        }
        Session::put('cart', $cart);

        Session::flash('success', 'Cart updated');
        return redirect()->back();
    }

    public function index()
    {
        $breadcrumbs = [
            'title' => 'Cart',
            'metaTitle' => 'Cart',
            'metaDescription' => 'Cart',
            'metaKeyword' => 'Cart',
            'links' => [
                ['url' => url('/'), 'title' => 'Home']
            ]
        ];
        $view = 'Templates.Cart';
        return view('Front', compact('view', 'breadcrumbs'));
    }

    public function checkout()
    {
        $breadcrumbs = [
            'title' => 'Checkout',
            'metaTitle' => 'Checkout',
            'metaDescription' => 'Checkout',
            'metaKeyword' => 'Checkout',
            'links' => [
                ['url' => url('/'), 'title' => 'Home']
            ]
        ];
        $view = 'Templates.Checkout';
        $countries = $this->commonService->getCountry();
        return view('Front', compact('view', 'breadcrumbs', 'countries'));
    }
}
