<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Formula_ICO</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('drug_formulas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-11">
                    <select class="form-control" name="formula_id" required>
                        <option value="">Generic Name w formula</option>
                        {{-- @if(isset($drug->to )) --}}
                        @foreach ($formulas as $formula )
                        <option value="{{$formula->id}}" {{($drug->
                            formula_id==$formula->id)?
                            'selected':''}}>
                            {{$formula->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('formula_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1" style="margin-left: 76%;">
                    <div class="input-group-append">
                        <x-dashboard.save-button></x-dashboard.save-button>
                    </div>
                </div>
            </div>
        </form>
        @foreach ($drug_formulas as $drug_formula)
        <div class="row">
            <div class="col-md-8">
                <input type="text" class="form-control" value="{{$drug_formula->formula->name}}" disabled>
            </div>
            <div class="col-1">
                <form action="{{route('drug_formulas.destroy',$drug_formula->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-dashboard.delete-button></x-dashboard.delete-button>
                </form>
            </div>
        </div>
        {{-- <br> --}}
        @endforeach
    </div>
</div>