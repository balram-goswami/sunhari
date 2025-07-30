<div class="container-xxl flex-grow-1 container-p-y">
  @if($row->id)
    {{Form::open(array('route' => array($routeName.'.update', $row->id), 'method' => 'PUT'))}}
  @else
    {{Form::open(array('route' => $routeName.'.store', 'method' => 'POST'))}}
  @endif
     <div class="card mb-4">
     		<div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-2">
  		   <h4 class="fw-bold py-3 mb-0 pull-left">{{ $row->id?'Edit':'Add'}} {{$serviceName}} </h4>
         <div class="action-btns">
           <a href="{{route($routeName.'.index')}}" title="Back" class="btn btn-warning me-3">
             <i class='bx bx-arrow-back'></i>
           </a>
           <button class="btn btn-primary" title="Save">
             <i class='bx bxs-save'></i>
           </button>
         </div>
  		</div>
  		<div class="card-body mt-4">
  			<div class="text-nowrap">
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
            <label class="col-sm-2 col-form-label" for="description">Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <textarea
                  name="description"
                  id="description"
                  rows="5"
                  class="form-control"
                  required>{{$row->description??old('description')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="parent_id">Parent Category</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select name="parent_id" id="parent_id" class="form-control select2">
                  <option value="">Choose Option</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $row->parent_id?'selected':''}}>{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
  		  </div>
  		</div>
    </div>
  </form>
</div>