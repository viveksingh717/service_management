<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Edit Category</h1>
        <a href="{{route('admin/add_category')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Category List
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-11 mb-4">
            <div class="card shadow p-2">
                <div class="card-body">
                    @if ( Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>    
                    @endif
                    <form wire:submit.prevent="updateCategory" class="p-2">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name</label>
                                    <input type="text" class="form-control" name="subCategory_name" wire:model="subCategory_name" wire:keyup="generateSlug" placeholder="Enter Category_name">

                                    @error('subCategory_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Slug</label>
                                    <input type="text" class="form-control" name="subCategory_slug" wire:model="subCategory_slug" placeholder="Enter Slug">
                            
                                    @error('subCategory_slug') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Parent Category</label>
                                    <select class="form-control" name="parentCategory_id" wire:model="parentCategory_id">
                                      @foreach ($parentCategory as $item)
                                      @if ($item['id'] == $this->categoryId)
                                      <option value="{{$item['id']}}" selected>{{$item['category_name']}}</option>
                                      @else
                                      <option value="{{$item['id']}}">{{$item['category_name']}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="font-weight-bold">Description</label>
                          <textarea class="form-control" name="subCategory_desc" wire:model="subCategory_desc" rows="2" placeholder="Description"></textarea>
                          @error('subCategory_desc') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Choose Image</label>
                            <input type="file" class="form-control-file" name="subCategory_image" wire:model="newImage">

                            @error('subCategory_image') <span class="text-danger">{{ $message }}</span> @enderror

                            @if ($newImage)
                                <img src="{{$newImage->temporaryUrl()}}" alt="Img" width="50px" height="50px">
                            @else
                                <img src="{{asset('assets/categories/'.$subCategory_image)}}" alt="Img" width="50px" height="50px">
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary bg-gradient-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
