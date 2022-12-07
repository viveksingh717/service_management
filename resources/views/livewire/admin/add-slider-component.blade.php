<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Add Slider</h1>
        <a href="{{route('admin/slider')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Slider List
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
                    <form wire:submit.prevent="createSlider" class="p-2">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Title</label>
                                    <input type="text" class="form-control" name="title" wire:model="title" placeholder="Title">
                            
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">featured</label>
                                    <select class="form-control" name="featured" wire:model="featured">
                                      <option selected>Select</option>
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Status</label>
                                    <select class="form-control" name="status" wire:model="status">
                                      <option selected>Select</option>
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea class="form-control" name="description" rows="2" wire:model="description" placeholder="Description Here.."></textarea>
                    
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Slider Image</label>
                            <input type="file" class="form-control-file" name="slider_image" wire:model="slider_image">
                            @if ($slider_image)
                            
                                <img src="{{$slider_image->temporaryUrl()}}" alt="Img" width="50px" height="50px">
                            
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary bg-gradient-primary">Add Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
