<div class="variations-row row mt-3" style="box-shadow: 0px 0px 6px 1px #ccc;" data-index="{{$index}}">
  <input type="hidden" name="prodVariations[{{$index}}][variation_id]" value="{{$variationRow->id}}">
  <input type="hidden" name="prodVariations[{{$index}}][product_variation_ids]" value="{{implode('-', $variationIds)}}">
  <div class="col-sm-10"></div>
  <div class="col-sm-2"><button class="btn btn-danger btnRemoveVariationRow" type="button">Remove</button></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-10">
    <div class="row mb-3">
      @foreach($variations as $variation)
        @php $variationSlug = strtolower(str_replace(' ', '_', $variation->name)) @endphp
        @php $variationId = $variationRow->main_price ? $variationRow->variation_raw[$variationSlug] : '' @endphp
        <div class="col-sm-3">
          <label class="col-sm-12 col-form-label" for="main_price">{{$variation->name}}</label>
          <div class="col-sm-12">
            <select class="form-control" name="prodVariations[{{$index}}][variation_raw][{{$variationSlug}}]" id="variation_raw">
              <option value="">Choose Option</option>
              @foreach($variation->subVariations as $subVariation)
                <option value="{{$subVariation->id}}" {{$variationId == $subVariation->id ? 'selected' : ''}}>{{$subVariation->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row mb-3">
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="main_price">Main Price</label>
        <div class="col-sm-12">
          <input
            type="text"
            name="prodVariations[{{$index}}][main_price]"
            class="form-control InputNumber"
            id="main_price"
            value="{{$variationRow->main_price??old('main_price')}}"
            required >
        </div>
      </div>
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="sale_price">Sale Price</label>
        <div class="col-sm-12">
          <input
            type="text"
            name="prodVariations[{{$index}}][sale_price]"
            class="form-control InputNumber"
            id="sale_price"
            value="{{$variationRow->sale_price??old('sale_price')}}"
             >
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="sale_start_date">Sale Start Date</label>
        <div class="col-sm-12">
          <input
            type="date"
            name="prodVariations[{{$index}}][sale_start_date]"
            class="form-control"
            id="sale_start_date"
            value="{{$variationRow->sale_start_date??old('sale_start_date')}}"
             >
        </div>
      </div>
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="sale_end_date">Sale End Date</label>
        <div class="col-sm-12">
          <input
            type="date"
            name="prodVariations[{{$index}}][sale_end_date]"
            class="form-control"
            id="sale_end_date"
            value="{{$variationRow->sale_end_date??old('sale_end_date')}}"
             >
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="sku">SKU</label>
        <div class="col-sm-12">
          <input
            type="text"
            name="prodVariations[{{$index}}][sku]"
            class="form-control"
            id="sku"
            value="{{$variationRow->sku??old('sku')}}"
            required >
        </div>
      </div>
      <div class="col-sm-6">
        <label class="col-sm-12 col-form-label" for="stock">Stock</label>
        <div class="col-sm-12">
          <input
            type="text"
            name="prodVariations[{{$index}}][stock]"
            class="form-control"
            id="stock"
            value="{{$variationRow->stock??old('stock')}}"
            required >
        </div>
      </div>
    </div>
  </div>
</div>