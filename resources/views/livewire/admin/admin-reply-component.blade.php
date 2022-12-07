<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Reply</h1>
        <a href="{{route('admin/adminContactUs')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            All Contact
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card shadow p-2">
                <div class="card-body">
                    @if ( Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>    
                    @endif
                    <form wire:submit.prevent="sendReply" class="p-2">
                        @csrf

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="font-weight-light">Email</label>
                                    <input type="text" class="form-control" name="email" wire:model="email" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-light">Reply Message</label>
                            <textarea class="form-control" name="msg" wire:model="msg" rows="3"  placeholder="Type here.."></textarea>
                    
                            @error('msg') <span class="text-danger">{{ $message }}</span> @enderror
                            
                        </div>
            
                        <button type="submit" class="btn btn-dark bg-gradient-dark">Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
