<div class="container-fluid py-4" id="prgnancy_stage">
    <div class="row">
        <div class="col-lg-12">
            <div class="row" style=" justify-content: center; ">
                <div class="col-md-11 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Pregnancy Stages</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{route('pregnancy_stages.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" placeholder="Pregnancy Stage" name="pregnancy_stage"
                                            value="{{old('pregnancy_stage')}}" required />
                                        @error('pregnancy_stage')
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
                            @foreach ($pregnancy_stages as $pregnancy_stage )
                            <form action="{{route('pregnancy_stages.update',$pregnancy_stage->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Pregnancy Stage"
                                            value="{{$pregnancy_stage->pregnancy_stage}}" name="pregnancy_stage" required />
                                        @error('pregnancy_stage')
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
                                        <form action="{{route('pregnancy_stages.destroy',$pregnancy_stage->id)}}"
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