<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">1ry Variables</h6>
            </div>
            <div class="col-6 text-end">
                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <form action="{{route('variables.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $drug->id }}" name="drug_id">
            <div class="row">
                <div class="col-md-3">
                    <input type="radio" name="option" value="main_id" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Main Id : ( {{ $drug->code }} )
                    </label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="option" value="sub_id" id="flexRadioDefault2">
                    <select class="form-control" name="indication_id" style="width: 75%; display:inline;">
                        <option value="">Indication</option>
                        {{-- @if(isset($drug->to )) --}}
                        @foreach ($variable_indications as $variable_indication)
                        <option value="{{$variable_indication->id}}" {{($drug->
                            indication_id==$variable_indication->id)?
                            'selected':''}}>
                            {{$variable_indication->indication->indication_title}}
                            ({{$variable_indication->code}})
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <div class="input-group-append">
                        <button class="btn bg-gradient-dark mb-0" type="submit"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body p-3">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Drug</th>
                        <th scope="col">code</th>
                        <th scope="col"><i style="font-size:24px" class="fa">&#xf013;</i>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variables as $variable)
                    <tr>
                        @if ($variable->variableable_type == "App\Models\Drug")
                        <td>{{ $variable->drug->name }}</td>
                        <td>{{ $variable->drug->code }}</td>
                        @else
                        <td>{{ $variable->drugIndication->indication->indication_title }}
                        </td>
                        <td>{{ $variable->drugIndication->code }}</td>
                        @endif
                        <td>
                            <div class="btn-icon-list">
                                <form action="{{route('variables.destroy',$variable->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn bg-gradient-info mb-0"
                                        href="{{ route('variables.show', ['variable'=>$variable->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger" style="margin-bottom: 0rem;"><i
                                            class="fa fa-trash"></i></button>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('fixed_doses_create', $variable->id) }}">Fixed
                                        Dose</a>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('dose_or_create', $variable->id) }}">Dose Or</a>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('dose_and_create', $variable->id) }}">Dose And</a>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('notes_or_create', $variable->id) }}">Notes Or</a>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('notes_and_create', $variable->id) }}">Notes And</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>