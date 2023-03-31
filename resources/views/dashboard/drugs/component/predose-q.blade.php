{{-- PREDOSECARD card  --}}
<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Pre-dose Q</h6>
            </div>
            <div class="col-6 text-end">
                {{-- <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a> --}}
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <div class="col-6 d-flex align-items-center">
            <h7 class="mb-0">Ask When Select ..</h7>
        </div>
        <form action="{{route('predoses.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-3"></div>
                @include('dashboard.forbidden-case.div_ajax_component.fetch-select-and-add-rows')
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-1">
                        <div class="input-group-append">
                            <x-dashboard.save-button></x-dashboard.save-button>
                        </div>
                    </div>
                </div>
                <br>
        </form>
        @foreach ($predoses as $predose )
        <hr class="horizontal dark mt-0">
        <input type="hidden" value="{{ $drug->id }}" name="drug_id">
        @foreach ($predose->predoseVariable as $values)
        @if ($values->variableable_type == 'App\Models\Age')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Age" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->age->name }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\Gender')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Gender" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->gender->name }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\Weight')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Weight" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->weight->weight }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\PregnancyStage')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Pregnancy Stage" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->pregnancyStage->pregnancy_stage }}"
                    disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\IllnessSub')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Illness Data" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->illnessSub->name }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\Drug')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Drug" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->drug->name }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\Indication')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="Indication" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $values->indication->indication_title }}"
                    disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @elseif ($values->variableable_type == 'App\Models\DrugIndication')
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" value="DrugIndication" disabled /><br>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"
                    value="{{ $values->drugIndication->indication->indication_title }}" disabled /><br>
            </div>
            <div class="col">
                <form action="{{route('predose_variable_delete',$predose->id)}}" method="POST">
                    @csrf
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @endif
        @endforeach

        <div class="row">
            <div class="col-1">
                <a href="{{ route('first_question', $predose->id) }}"
                    style="box-sizing: border-box; position: absolute; width: 87px; height: 49px; color: #5E5E5E;font-family: cursive; font-size: 15px;background: #FFFFFF; border: 2px solid #FFE976; box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.02), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0151852), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.0121481), 0px 20px 13px rgba(0, 0, 0, 0.01), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.00785185), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.00481481); border-radius: 28px;"
                    class="btn bg-gradient-primary mb-0">Q 1</a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-1">
                <a href="{{ route('second_question', $predose->id) }}"
                    style="box-sizing: border-box; position: absolute; width: 87px; height: 49px; color: #5E5E5E;font-family: cursive; font-size: 15px;background: #FFFFFF; border: 2px solid #FFE976; box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.02), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0151852), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.0121481), 0px 20px 13px rgba(0, 0, 0, 0.01), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.00785185), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.00481481); border-radius: 28px;"
                    class="btn bg-gradient-primary mb-0">Q 2</a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-1">
                <a href="{{ route('third_question', $predose->id) }}"
                    style="box-sizing: border-box; position: absolute; width: 87px; height: 49px; color: #5E5E5E;font-family: cursive; font-size: 15px;background: #FFFFFF; border: 2px solid #FFE976; box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.02), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0151852), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.0121481), 0px 20px 13px rgba(0, 0, 0, 0.01), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.00785185), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.00481481); border-radius: 28px;"
                    class="btn bg-gradient-primary mb-0">Q 3</a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-5">
                <a href="{{ route('fourth_question', $predose->id) }}"
                    style="box-sizing: border-box; position: absolute; width: 87px; height: 49px; color: #5E5E5E;font-family: cursive; font-size: 15px;background: #FFFFFF; border: 2px solid #FFE976; box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.02), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0151852), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.0121481), 0px 20px 13px rgba(0, 0, 0, 0.01), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.00785185), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.00481481); border-radius: 28px;"
                    class="btn bg-gradient-primary mb-0">Q 4</a>
            </div>


            <div class="col">
                <form action="{{route('predoses.destroy',$predose->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-dashboard.delete-button></x-dashboard.delete-button>

                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>