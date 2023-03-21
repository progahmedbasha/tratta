<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Indication</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('drug_indications.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-11">
                    <select class="form-control" name="indication_id" required>
                        <option value="">Indication</option>
                        {{-- @if(isset($drug->to )) --}}
                        @foreach ($indications as $indication )
                        <option value="{{$indication->id}}" {{($drug->
                            indication_id==$indication->id)?
                            'selected':''}}>
                            {{$indication->indication_title}}
                        </option>
                        @endforeach
                    </select>
                    @error('indication_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1" style="margin-left: 84%;">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </form>
        @foreach ($drug_indications as $drug_indication)
        <div class="row">
            <div class="col-md-5">
                <input type="text" class="form-control" value="{{$drug_indication->indication->indication_title}}"
                    disabled>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="{{$drug_indication->code}}" disabled>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</div>