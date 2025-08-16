<div class="container-xxl flex-grow-1 container-p-y">
  @if($row->id)
    {{Form::open(array('route' => array($routeName.'.update', $row->id), 'method' => 'PUT'))}}
  @else
    {{Form::open(array('route' => $routeName.'.store', 'method' => 'POST'))}}
  @endif
    <div class="card mb-4">
      <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
         <h4 class="fw-bold py-3 mb-0 pull-left">{{$row->id ? 'Edit' :'Add'}} {{$serviceName}}</h4>
         <div class="action-btns">
           <a href="{{route($routeName.'.index')}}" title="Back" class="btn btn-warning me-3">
             <i class='bx bx-arrow-back'></i>
           </a>
           <button class="btn btn-primary" title="Save">
             <i class='bx bxs-save'></i>
           </button>
         </div>
      </div>
    </div>
    <div class="card mb-4">
     	<div class="card-header sticky-element bg-label-primary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
  		   <h4 class="fw-bold py-3 mb-0 pull-left">Basic Info</h4>
  		</div>
  		<div class="card-body mt-4">
  			<div class="text-nowrap">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">Image</label>
            <div class="col-md-10 imageUploadGroup">
              <img src="{{asset($row->image)}}" class="file-upload" id="image-img" style="width: 100px; height: 100px;">
              <button type="button" data-eid="image" class="btn btn-success setFeaturedImage">Select image</button>
              <button type="button" data-eid="image"  class="btn btn-warning removeFeaturedImage">Remove image</button>
              <input type="hidden" name="image" id="image" value="{{$row->image}}">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                name="name"
                class="form-control"
                id="name"
                value="{{$row->name??old('name')}}"
                required >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="slug">Slug</label>
            <div class="col-sm-10">
              <input
                type="text"
                name="slug"
                class="form-control"
                id="slug"
                value="{{$row->slug??old('slug')}}"
                required >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="short_description">Short Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea
                  name="short_description"
                  id="short_description"
                  rows="5"
                  class="form-control"
                  required>{{$row->short_description??old('short_description')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="description">Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea
                  name="description"
                  id="description"
                  rows="5"
                  class="form-control ckeditor"
                  required>{{$row->description??old('description')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="is_featured">Is Featured</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" {{($row->is_featured??old('is_featured')) == 1?'checked':''}}>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="is_saleable">Is SaleAble</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="checkbox" name="is_saleable" value="1" id="is_saleable" {{($row->is_saleable??old('is_saleable')) == 1?'checked':''}}>
              </div>
            </div>
          </div>
  		  </div>
  		</div>
    </div>
    <div class="card mt-3">
      <div class="card-header sticky-element bg-label-danger d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
         <h4 class="fw-bold py-3 mb-0 pull-left">SEO</h4>
      </div>
      <div class="card-body mt-4">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="meta_title">Meta Title</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="meta_title"
              class="form-control"
              id="meta_title"
              value="{{$row->meta_title??old('meta_title')}}"
              required >
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="meta_keyword">Meta Keyword</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="meta_keyword"
              class="form-control"
              id="meta_keyword"
              value="{{$row->meta_keyword??old('meta_keyword')}}"
              required >
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="meta_description">Meta Description</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="meta_description"
              class="form-control"
              id="meta_description"
              value="{{$row->meta_description??old('meta_description')}}"
              required >
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
         <h4 class="fw-bold py-3 mb-0 pull-left">Category & Tags</h4>
      </div>
      <div class="card-body mt-4">
        <div class="row">
          <div class="col-sm-6">
            <h5>Category</h5>
            <ul>
              @foreach($categories as $category)
                <li>
                  <label for="categories_{{$category->id}}">
                    <input type="checkbox" id="categories_{{$category->id}}" name="categories[]" value="{{$category->id}}" {{in_array($category->id, $selectedCats)?'checked':''}}>
                    {{$category->name}}
                  </label>
                  @if($category->childs)
                    <ul>
                      @foreach($category->childs as $childCategory)
                        <li>
                          <label for="categories_{{$childCategory->id}}">
                            <input type="checkbox" id="categories_{{$childCategory->id}}" name="categories[]" value="{{$childCategory->id}}" {{in_array($category->id, $selectedCats)?'checked':''}}>
                            {{$childCategory->name}}
                          </label>
                          @if($childCategory->childs)
                            <ul>
                              @foreach($childCategory->childs as $inChildCategory)
                                <li>
                                  <label for="categories_{{$inChildCategory->id}}">
                                    <input type="checkbox" id="categories_{{$inChildCategory->id}}" name="categories[]" value="{{$inChildCategory->id}}" {{in_array($category->id, $selectedCats)?'checked':''}}>
                                    {{$inChildCategory->name}}
                                  </label>
                                </li>
                              @endforeach
                            </ul>
                          @endif
                        </li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach
            </ul>
          </div>
          <div class="col-sm-6">
            <h5>Tags</h5>
            <ul>
              @foreach($tags as $tag)
                <li>
                  <label for="tags_{{$tag->id}}">
                    <input type="checkbox" id="tags_{{$tag->id}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, $selectedTags)?'checked':''}}>
                    {{$tag->name}}
                  </label>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header sticky-element bg-label-info d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
         <h4 class="fw-bold py-3 mb-0 pull-left">Pricing & Variations</h4>
         <div class="action-btns">
         </div>
      </div>
      <div class="card-body mt-4">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="productType">Type</label>
          <div class="col-sm-10">
            <div class="input-group input-group-merge">
              <select name="type" id="productType" class="form-control">
                <option value="simple" {{$row->type == 'simple' ? 'selected' : ''}}>Simple</option>
                <option value="variable" {{$row->type == 'variable' ? 'selected' : ''}}>Variable</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-3 product-simple product-type-display">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <div class="row mb-3">
              <div class="col-sm-6">
                <label class="col-sm-12 col-form-label" for="main_price">Main Price</label>
                <div class="col-sm-12">
                  <input
                    type="text"
                    name="main_price"
                    class="form-control InputNumber"
                    id="main_price"
                    value="{{$row->main_price??old('main_price')}}"
                    required >
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-sm-12 col-form-label" for="sale_price">Sale Price</label>
                <div class="col-sm-12">
                  <input
                    type="text"
                    name="sale_price"
                    class="form-control InputNumber"
                    id="sale_price"
                    value="{{$row->sale_price??old('sale_price')}}"
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
                    name="sale_start_date"
                    class="form-control"
                    id="sale_start_date"
                    value="{{$row->sale_start_date??old('sale_start_date')}}"
                     >
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-sm-12 col-form-label" for="sale_end_date">Sale End Date</label>
                <div class="col-sm-12">
                  <input
                    type="date"
                    name="sale_end_date"
                    class="form-control"
                    id="sale_end_date"
                    value="{{$row->sale_end_date??old('sale_end_date')}}"
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
                    name="sku"
                    class="form-control"
                    id="sku"
                    value="{{$row->sku??old('sku')}}"
                    required >
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-sm-12 col-form-label" for="stock">Stock</label>
                <div class="col-sm-12">
                  <input
                    type="text"
                    name="stock"
                    class="form-control"
                    id="stock"
                    value="{{$row->stock??old('stock')}}"
                    required >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 product-variable product-type-display">
          <div class="col-sm-9">
            <select class="form-control select2" id="main_variations" multiple>
              @foreach($variations as $variation)
                <option value="{{$variation->id}}">{{$variation->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3">
            <button type="button" class="btn btn-primary addNewVariation">Add Variation Row</button>
          </div>
          <div class="variations-rows-group">
            @if($row->variations)
              @foreach($row->variations as $index => $variationRow)
                @php
                  $product_id = $row->product_id;  
                  $variationIds = explode('-', $variationRow->product_variation_ids);  
                  $variationRow->variation_raw = maybe_decode($variationRow->variation_raw);
                  $variations = \App\Services\CommonService::getVariationWithChildById($variationIds);
                  echo view('Admin.Ecommerce.Product.VariationRow', compact('index', 'product_id', 'variations', 'variationRow', 'variationIds'));
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header sticky-element bg-label-warning d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
         <h4 class="fw-bold py-3 mb-0 pull-left">Gallery </h4>
         <div class="action-btns">
           <button class="btn btn-primary addNewGallery" type="button" title="Add New">
              Add New
           </button>
         </div>
      </div>
      <div class="card-body mt-4">
        <div class="row mb-3 product-gallery-group">
          @if($row->galleries)
            @foreach($row->galleries as $gallery)
              <div class="col-sm-2 mb-3" data-index="{{$gallery->id}}">
                <div class="col-md-10 imageUploadGroup">
                  <img src="{{asset($gallery->image)}}" class="file-upload" id="image-{{$gallery->id}}-img" style="width: 100%; height:100%"><br>
                  <button type="button" data-eid="image-{{$gallery->id}}" class="btn btn-success setFeaturedImage">Select</button>
                  <button type="button" data-eid="image-{{$gallery->id}}"  class="btn btn-warning removeFeaturedImage removeGalleryImage">Remove</button>
                  <input type="hidden" name="galleries[{{$gallery->id}}]" id="image-{{$gallery->id}}" value="{{$gallery->image}}">
                </div>
              </div>
            @endforeach
          @else
            <div class="col-sm-2 mb-3" data-index="0">
              <div class="col-md-10 imageUploadGroup">
                <img src="" class="file-upload" id="image-0-img" style="width: 100%; height:100%"><br>
                <button type="button" data-eid="image-0" class="btn btn-success setFeaturedImage">Select</button>
                <button type="button" style="display: none" data-eid="image-0"  class="btn btn-warning removeFeaturedImage removeGalleryImage">Remove</button>
                <input type="hidden" name="galleries[0]" id="image-0" value="">
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#productType').change(function(event) {
      let type = $(this).val();
      $('.product-type-display').css('display', 'none');
      $('.product-'+type).fadeIn();
    });
    $('#productType').trigger('change');
    $('.addNewGallery').click(function(event) {
      let lstIndex = parseInt($('.product-gallery-group .col-sm-2:last-child').attr('data-index'));
      lstIndex = (isNaN(lstIndex) || lstIndex === undefined) ? 0 : (lstIndex + 1);
      $('.product-gallery-group').append('<div class="col-sm-2 mb-3" data-index="'+lstIndex+'">'+
        '<div class="col-md-10 imageUploadGroup">'+
          '<img src="" class="file-upload" id="image-'+lstIndex+'-img" style="width: 100%; height:100%"><br>'+
          '<button type="button" data-eid="image-'+lstIndex+'" class="btn btn-success setFeaturedImage">Select</button>'+
          '<button type="button" style="display: none" data-eid="image-'+lstIndex+'"  class="btn btn-warning removeFeaturedImage removeGalleryImage">Remove</button>'+
          '<input type="hidden" name="galleries['+lstIndex+']" id="image-'+lstIndex+'" value="">'+
        '</div>'+
      '</div>')
    });

    $(document).on('click', '.removeGalleryImage', function(event) {
      event.preventDefault();
      $(this).closest('.col-sm-2').remove();
    });

    $('.addNewVariation').click(function(event) {
      event.preventDefault();
      let variationIds = $('#main_variations').val();
      if(variationIds.length == 0) {
        window.alert("Please select atleast 1 variation.");
        return false;
      }
      let lstIndex = parseInt($('.variations-rows-group .variations-row:last-child').attr('data-index'));
      lstIndex = (isNaN(lstIndex) || lstIndex === undefined) ? 0 : (lstIndex + 1);
      $.ajax({
        url: '{{route("products.getVariationRow")}}',
        type: 'GET',
        data: {index: lstIndex, product_id: '{{$row->id}}', variationIds},
      })
      .done(function(response) {
        $('.variations-rows-group').append(response);
      })
      .fail(function() {
        window.alert("Error loading variation row.");
      });
    });
    $(document).on('click', '.btnRemoveVariationRow', function(event) {
      event.preventDefault();
      $(this).closest('.variations-row').remove();
    });
  });
</script>