<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Services</h1>
        <a href="{{route('admin/addServices')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Add Service
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card shadow p-2">
                <div class="card-header font-weight-bold">All Category Services</div>
                <div class="card-body">
                    @if ( Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>    
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                              <tr>
                                <th>Sr.</th>
                                <th>Category</th>
                                <th>Service</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Tagline</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($services as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item['sub_category']['subCategory_name']}}</td>
                                        <td>{{$item['service_name']}}</td>
                                        <td>{{$item['service_slug']}}</td>
                                        <td>{{$item['price']}}</td>
                                        <td>{{$item['discount']}}</td>
                                        <td>{{$item['tagline']}}</td>
                                        <td>
                                            <img src="{{asset('assets/services/'.$item['service_image'])}}" alt="{{$item['service_name']}}" width="40px" height="40px">
                                        </td>
                                        <td>{{$item['status'] ? 'Active' : 'Deactive'}}</td>

                                        <td>
                                            <a href="{{url('admin/editServices/'.$item['id'])}}" class="text-decoration-none text-info">
                                            <i class="fa fa-fw fa-pen-square" style="font-size: 20px"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="text-decoration-none text-danger" onclick="confirm('Are you sure want to delete this category?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$item['id']}})">
                                                <i class="fa fa-fw fa-trash" style="font-size: 20px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
