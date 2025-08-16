<?php

namespace App\Services;

use App\Models\{
    Product,
    ProductCategory,
    ProductGallery,
    ProductTag,
    ProductVariation
};
use DB;
use App\Services\CommunicationService;

class ProductService
{
    protected $service;
    protected $communicationService;
    public function __construct(Product $service)
    {
        $this->service = $service;
    }
    public function table($type = null)
    {
        return $this->service->select('*');
    }
    public function select()
    {
        return $this->service;
    }
    public function paginate($request)
    {
        return $this->service->paginate(pagination($request->per_page));
    }
    public function requestOnly($request) {
    	return $request->only('name', 'slug', 'short_description', 'description', 'image', 'main_price', 'sale_price', 'sale_start_date', 'sale_end_date', 'type', 'sku', 'stock', 'meta_title', 'meta_keyword', 'meta_description', 'is_featured', 'is_saleable');
    }
    public function store($request)
    {
        $service = new Product($this->requestOnly($request));

        $service->created_at = dateTime();
        $service->save();
        $this->addUpdateCategory($service, $request);
        $this->addUpdateTags($service, $request);
        $this->addUpdateGallery($service, $request);
        $this->addUpdateVariations($service, $request);
        return $service;
    }
    public function get($id = null)
    {
        return $this->service->find($id);
    }
    public function getWithSlug($id = null)
    {
        return $this->service->whereSlug($id)->get()->first();
    }
    public function update($request, $service)
    {
        if (!is_object($service)) {
            $service = $this->get($service);
        }
        $service->update($this->requestOnly($request));
        $service->slug = $request->slug;
        $service->updated_at = dateTime();
        $service->save();
        $this->addUpdateCategory($service, $request);
        $this->addUpdateTags($service, $request);
        $this->addUpdateGallery($service, $request);
        $this->addUpdateVariations($service, $request);

        return $service;
    }
    public function addUpdateCategory($product, $request) {
        if ($request->categories) {
            $insertIds = [];
            foreach ($request->categories as $cateId) {
                if (!$category = ProductCategory::where('product_id', $product->id)->where('category_id', $cateId)->get()->first()) {
                    $category = new ProductCategory();
                    $category->product_id = $product->id;
                    $category->category_id = $cateId;
                    $category->created_at = dateTime();
                    $category->updated_at = dateTime();
                    $category->save();
                }
                $insertIds[] = $category->id;
            }
            if (count($insertIds) > 0) {
                ProductCategory::where('product_id', $product->id)->whereNotIn('id', $insertIds)->delete();
            }
        }
    }
    public function addUpdateTags($product, $request) {
        if ($request->tags) {
            $insertIds = [];
            foreach ($request->tags as $tagId) {
                if (!$tag = ProductTag::where('product_id', $product->id)->where('tag_id', $tagId)->get()->first()) {
                    $tag = new ProductTag();
                    $tag->product_id = $product->id;
                    $tag->tag_id = $tagId;
                    $tag->created_at = dateTime();
                    $tag->updated_at = dateTime();
                    $tag->save();
                }
                $insertIds[] = $tag->id;
            }
            if (count($insertIds) > 0) {
                ProductTag::where('product_id', $product->id)->whereNotIn('id', $insertIds)->delete();
            }
        }
    }
    public function addUpdateGallery($product, $request) {
        if ($request->galleries) {
            $insertIds = [];
            foreach ($request->galleries as $imageId => $image) {
                if (!$gallery = ProductGallery::where('product_id', $product->id)->where('id', $imageId)->get()->first()) {
                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->created_at = dateTime();
                }
                $gallery->image = $image;
                $gallery->updated_at = dateTime();
                $gallery->save();
                $insertIds[] = $gallery->id;
            }
            if (count($insertIds) > 0) {
                ProductGallery::where('product_id', $product->id)->whereNotIn('id', $insertIds)->delete();
            }
        }
    }
    public function addUpdateVariations($product, $request) {
        if ($request->prodVariations) {
            $insertIds = [];
            foreach ($request->prodVariations as $variation) {
                $variationId = (isset($variation['variation_id'])?$variation['variation_id']:'');
                if (!$productVar = ProductVariation::where('product_id', $product->id)->where('id', $variationId)->get()->first()) {
                    $productVar = new ProductVariation();
                    $productVar->product_id = $product->id;
                    $productVar->created_at = dateTime();
                }
                $productVar->product_variation_ids = $variation['product_variation_ids'];
                $productVar->variation_raw = maybe_encode($variation['variation_raw']);
                $productVar->sku = $variation['sku'];
                $productVar->stock = $variation['stock'];
                $productVar->main_price = $variation['main_price'];
                $productVar->sale_price = $variation['sale_price'];
                $productVar->sale_start_date = $variation['sale_start_date'];
                $productVar->sale_end_date = $variation['sale_end_date'];
                $productVar->updated_at = dateTime();
                $productVar->save();
                $insertIds[] = $productVar->id;
            }
            if (count($insertIds) > 0) {
                ProductVariation::where('product_id', $product->id)->whereNotIn('id', $insertIds)->delete();
            }
        }
    }
    public function delete($service = null)
    {
        if (!is_object($service)) {
            $service = $this->get($service);
        }
        $service->delete();
        return $service;
    }
    public function cloneProduct($product) {
        DB::beginTransaction();
        try {
            if (!is_object($product)) {
                $product = $this->get($product);
            }
                            
            // Clone Product
            $newProduct = $product->replicate();
            $newProduct->name = $product->name . ' (Copy)';
            $newProduct->save();
            
            // Clone Tags
            foreach ($product->tags as $tag) {
                $newTag = $tag->replicate();
                $newTag->product_id = $newProduct->id;
                $newTag->save();
            }

            // Clone Category
            foreach ($product->category as $category) {
                $newCategory = $category->replicate();
                $newCategory->product_id = $newProduct->id;
                $newCategory->save();
            }
            
            // Clone Variations
            foreach ($product->variations as $variation) {
                $newVariation = $variation->replicate();
                $newVariation->product_id = $newProduct->id;
                $newVariation->save();
            }
            // Clone Variations
            foreach ($product->galleries as $gallery) {
                $newGallery = $gallery->replicate();
                $newGallery->product_id = $newProduct->id;
                $newGallery->save();
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
