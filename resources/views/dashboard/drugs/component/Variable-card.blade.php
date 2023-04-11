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
                <div class="col-md-4">
                    <input type="radio" name="option" value="main_id" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        <select class="form-control" style="display:inline; background-color:#E54E6D;" disabled>
                            <option> Main Id : ( {{ $drug->code }} )</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="option" value="sub_id" id="flexRadioDefault2">
                    <select class="form-control" name="indication_id"
                        style="width: 75%; display:inline; background-color:#FFE976;">
                        <option value="">SubID</option>
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
                        <x-dashboard.add-button type="submit"></x-dashboard.add-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body p-3">
        <div class="col">
            <div class="table-responsive" style="text-align:center;">
            <table class="table">
                <tbody>
                    @foreach ($variables as $variable)
                    <tr style="border-bottom: 1px solid #F2CC8F;">
                        @if ($variable->variableable_type == "App\Models\Drug")
                        <td style="padding-top: 20px;color:#CFBEB6;">
                            <div style="border-bottom: 1px solid #CFBEB6;padding-bottom: 16px;">
                                {{ $variable->drug->name }}
                            </div>
                        </td>
                        <td style="padding-top: 20px;color:#E54E6D;">
                            <div style="border-bottom: 1px solid #E54E6D;padding-bottom: 16px;">
                                {{ $variable->drug->code }}
                            </div>
                        </td>
                        @else
                        <td style="padding-top: 20px;color:#CFBEB6;">
                            <div style="border-bottom: 1px solid #CFBEB6;padding-bottom: 16px;">
                                {{ $variable->drugIndication->indication->indication_title }}
                            </div>
                        </td>
                        <td style="padding-top: 20px;color:#E54E6D;">
                            <div style="border-bottom: 1px solid #E54E6D;padding-bottom: 16px;">
                                {{ $variable->drugIndication->code }}
                            </div>
                        </td>
                        @endif
                        <td>
                            <div class="btn-icon-list">
                                <form action="{{route('variables.destroy',$variable->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-link"
                                        href="{{ route('variables.show', ['variable'=>$variable->id]) }}"><img
                                            src='{{ url('data/VarIconsax.svg') }}' /></a>
                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                    {{-- for buttons --}}
                                    <style>
                                        .test:hover {
                                            border-top: 1px solid #037ffc;
                                            border-bottom: 1px solid #037ffc;
                                            border-left: 1px solid #037ffc;
                                            border-right: 1px solid #037ffc;
                                        }
                                        .test {
                                            box-sizing: border-box;
                                            width: 91px;
                                            height: 51px;
                                            background: #FFFFFF;
                                            font-family: 'Ink Free';
                                            font-style: normal;
                                            color: #5E5E5E;
                                            font-weight: 400;
                                            display: inline;
                                            font-size: 16px;
                                            border: aliceblue;
                                            box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.02), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0151852), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.0121481), 0px 20px 13px rgba(0, 0, 0, 0.01), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.00785185), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.00481481);
                                            border-radius: 28px;
                                        }
                                    </style>
                                    <a href="{{ route('fixed_doses_create', $variable->id) }}"
                                        class="btn test">Fixed Dose</a>

                                    <a href="{{ route('dose_or_create', $variable->id) }}"
                                        class="btn test">Dose Or</a>

                                    <a href="{{ route('dose_and_create', $variable->id) }}"
                                        class="btn test">Dose And</a>

                                    <a href="{{ route('notes_or_create', $variable->id) }}"
                                        class="btn test">Notes Or</a>

                                    <a href="{{ route('notes_and_create', $variable->id) }}"
                                        class="btn test">Notes And</a>
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
</div>