{{-- formula card  --}}
<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">MOA</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('moa_drugs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-8">
                    <textarea class="form-control" placeholder="Text" name="text" required>{{old('text')}}</textarea>
                    @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('effect_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1"></div>
                <div class="col-1">
                    <div class="input-group-append">
                        <x-dashboard.save-button></x-dashboard.save-button>
                    </div>
                </div>
            </div>
            <br>
        </form>
        <br>
        <hr class="horizontal dark mt-0">
        @foreach ($moa_drugs as $moa_drug )
        <form action="{{route('moa_drugs.update',$moa_drug->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-8">
                    <textarea class="form-control" placeholder="Text" name="text"
                        required>{{$moa_drug->text}}</textarea>
                    @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('effect_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-1"></div>
                <div class="col-md-1">
                    <div class="input-group-append">
                        <x-dashboard.edit-button></x-dashboard.edit-button>
                    </div>
                </div>
        </form>
        <div class="col">
            <form action="{{route('moa_drugs.destroy',$moa_drug->id)}}" method="POST">
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
<br>