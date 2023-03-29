<div class="container-fluid py-4" id="reckeck_drug">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Recheck Drug Hx (Interaction Severity)</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('interaction_severities.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Type" name="type"
                                            value="{{old('type')}}" required />
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="color" class="form-control form-control-color"
                                            style="height: 40px;" id="exampleColorInput" value="{{old('color')}}" name="color"
                                            title="Choose your color" required />
                                        @error('color')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.add-button type="submit"></x-dashboard.add-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <hr class="horizontal dark mt-0">
                            @foreach ($interaction_severities as $interaction_severity )
                            <form action="{{route('interaction_severities.update',$interaction_severity->id)}}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Type"
                                            value="{{$interaction_severity->type}}" name="type" required />
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-5">
                                        <input type="color" class="form-control form-control-color"
                                            style="height: 40px;" id="exampleColorInput"
                                            value="{{$interaction_severity->color}}" name="color"
                                            title="Choose your color" required />
                                        @error('color')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <div class="input-group-append">
                                            <x-dashboard.edit-button></x-dashboard.edit-button>
                                        </div>
                                    </div>
                            </form>
                                    <div class="col-1">
                                        <form action="{{route('interaction_severities.destroy',$interaction_severity->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-dashboard.delete-button></x-dashboard.delete-button>
                                        </form>
                                    </div>
                                </div>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>