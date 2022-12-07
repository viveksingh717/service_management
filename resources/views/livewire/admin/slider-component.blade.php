<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Sliders</h1>
        <a href="{{route('admin/addSlider')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Add Slider
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card shadow p-2">
                <div class="card-header font-weight-bold">All Sliders</div>
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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($sliders as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item['title']}}</td>
                                        <td>
                                            <img src="{{asset('assets/slide/'.$item['slider_image'])}}" alt="{{$item['service_name']}}" width="40px" height="40px">
                                        </td>
                                        <td>{{$item['featured'] == 1 ? 'Yes' : 'No'}}</td>
                                        <td>{{$item['status'] == 1 ? 'Active' : 'Deactive'}}</td>

                                        <td>
                                            <a href="{{url('admin/editSlider/'.$item['id'])}}" class="text-decoration-none text-info">
                                            <i class="fa fa-fw fa-pen-square" style="font-size: 20px"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="text-decoration-none text-danger" onclick="confirm('Are you sure want to delete this category?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{$item['id']}})">
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
