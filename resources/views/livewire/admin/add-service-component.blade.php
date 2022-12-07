<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Add Service</h1>
        <a href="{{route('admin/services')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Service List
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
                    <form wire:submit.prevent="createServices" class="p-2">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Service Name</label>
                                    <input type="text" class="form-control" name="service_name" wire:model="service_name" wire:keyup="generateSlug" placeholder="Enter Name">
                            
                                    @error('service_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Service Slug</label>
                                    <input type="text" class="form-control" name="service_slug" wire:model="service_slug" placeholder="Enter Slug">
                            
                                    @error('service_slug') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Choose Category</label>
                                    <select class="form-control" name="category_id" wire:model="category_id">
                                        <option selected>Choose Category</option>
                                        @foreach ($allCategory as $item)
                                        <option value="{{$item->id}}">{{$item->subCategory_name}}</option>
                                        @endforeach
                                    </select>       

                                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tagline</label>
                                    <textarea class="form-control" name="tagline" rows="2" wire:model="tagline" placeholder="Tagline Here.."></textarea>
                            
                                    @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea class="form-control" name="description" rows="2" wire:model="description" placeholder="Description Here.."></textarea>
                            
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Price</label>
                                    <input type="text" class="form-control" name="price" wire:model="price" placeholder="Price">

                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Discount</label>
                                    <input type="text" class="form-control" name="discount" wire:model="discount" placeholder="Discounted Ammount/Percent">
                            
                                    @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Discount Type</label>
                                    <select class="form-control" name="discount_type" wire:model="discount_type">
                                      <option selected>Choose Type</option>

                                      <option value="fixed">Fixed</option>
                                      <option value="percent">Percent</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Inclusion</label>
                                    <textarea class="form-control" name="inclusion" rows="2" wire:model="inclusion"></textarea>

                                    @error('inclusion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Exclusion</label>
                                    <textarea class="form-control" name="exclusion" rows="2" wire:model="exclusion"></textarea>
                            
                                    @error('exclusion') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Service Image</label>
                                    <input type="file" class="form-control-file" name="service_image" wire:model="service_image">
                                    @if ($service_image)
                                    
                                        <img src="{{$service_image->temporaryUrl()}}" alt="Img" width="50px" height="50px">
                                    
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Thumbnail</label>
                                    <input type="file" class="form-control-file" name="thumbnail" wire:model="thumbnail">
                                    @if ($thumbnail)
                                    
                                        <img src="{{$thumbnail->temporaryUrl()}}" alt="Img" width="50px" height="50px">
                                    
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary bg-gradient-primary">Add Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
