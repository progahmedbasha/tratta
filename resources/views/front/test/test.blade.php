<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html lang="en">
    <style>
        @font-face {
            font-family: Inkfree;
            src: url("{{url('dashboard/assets/css/Inkfree.ttf')}}");
        }

        body {
            /* background-image: url("{{ asset('dashboard/assets/icons/sidetop.svg') }}"); */
            background-repeat: no-repeat;
            background-size: 270px;
            font-family: Inkfree !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        input,
        p,
        select,
        ul,
        li,
        a,
        b,
        span,
        tr,
        td,
        option,
        label,
        button {
            font-family: Inkfree !important;
        }

        input[type=text],
        input[type=number],
        select:disabled,
        input[type=file],
        textarea {
            font-family: Inkfree !important;
        }
    </style>
    @include('dashboard.layouts.header')
    @include('dashboard.layouts.sweet-alert')
    <body class="g-sidenav-show  bg-gray-100">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <!--   Core JS Files   -->
            @include('dashboard.layouts.javascript')


            {{-- ///start --}}
            <div class="container-fluid py-4">
                <h1 style="text-align: center;font-family: cursive; color:black;">Test</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-11 mb-lg-0 mb-4">
                                <div class="card">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-6 d-flex align-items-center">
                                                {{-- <h6 class="mb-0">test</h6> --}}
                                            </div>
                                            <div class="col-6 text-end">
                                                <!--<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <form action="{{ route('tests.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-3">
                                                    <label>Drugs</label>
                                                    <select class="form-control" id="drug" onchange="selectVariable()" name="drug_id" required />
                                                    <option value="">Drugs</option>
                                                    @foreach ($drugs as $drug)
                                                    <option value="{{$drug->id}}" {{(old($drug->id)==$drug->id)?
                                                        'selected':''}}>
                                                        {{$drug->name}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>Indications</label>
                                                    <select class="form-control" id="indication" name="indication_id">
                                                    <option selected="true" disabled="disabled">Select Indication</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <hr class="horizontal dark mt-0">
                                            <div class="row">
                                                <div class="col">
                                                    <label>Genders</label>
                                                    <select class="form-control" name="gender_id" id="gender" onchange="selectGender()">
                                                    <option selected="true" disabled="disabled">Select Gender</option>
                                                    @foreach ($genders as $genders)
                                                    <option value="{{$genders->id}}" {{(old($genders->
                                                        id)==$genders->id)?
                                                        'selected':''}}>
                                                        {{$genders->name}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Weights</label>
                                                    <select class="form-control" name="weight_id">
                                                    <option selected="true" disabled="disabled">Select Weight</option>
                                                    @foreach ($weights as $weight)
                                                    <option value="{{$weight->id}}" {{(old($weight->id)==$weight->id)?
                                                        'selected':''}}>
                                                        {{$weight->weight}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Ages</label>
                                                    <select class="form-control" name="age_id">
                                                    <option selected="true" disabled="disabled">Select Age</option>
                                                    @foreach ($ages as $age)
                                                    <option value="{{$age->id}}" {{(old($age->id)==$age->id)?
                                                        'selected':''}}>
                                                        {{$age->name}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col" id="block" style="display: none;">
                                                    <label>Pregnancies</label>
                                                    <select class="form-control" name="pregnancy_stage_id">
                                                    <option selected="true" disabled="disabled">Select Pregnanacy Stage</option>
                                                    @foreach ($pregnancy_stages as $pregnancy_stage)
                                                    <option value="{{$pregnancy_stage->id}}" {{(old($pregnancy_stage->
                                                        id)==$pregnancy_stage->id)?
                                                        'selected':''}}>
                                                        {{$pregnancy_stage->pregnancy_stage}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Illness Data</label>
                                                    <select class="form-control" name="illness_category_id">
                                                    <option selected="true" disabled="disabled">Select Illness</option>
                                                    @foreach ($illness_subs as $illness_sub)
                                                    <option value="{{$illness_sub->id}}" {{(old($illness_sub->
                                                        id)==$illness_sub->id)?
                                                        'selected':''}}>
                                                        {{$illness_sub->name}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Drug Data</label>
                                                    <select class="form-control" name="drug_drug_id">
                                                    <option selected="true" disabled="disabled">Select Drug</option>
                                                    @foreach ($drugs_data as $drug)
                                                    <option value="{{$drug->id}}" {{(old($drug->id)==$drug->id)?
                                                        'selected':''}}>
                                                        {{$drug->name}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <hr class="horizontal dark mt-0">
                                            <div class="row">
                                                <div class="col-10"></div>
                                                <div class="col-1">
                                                    <div class="input-group-append">
                                                        <x-dashboard.save-button></x-dashboard.save-button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br><br><br><br><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ///end --}}

        </main>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    ////////////////////for fetch variables////////////
	   function selectVariable() {
              var drug_id = document.getElementById('drug').value;
              console.log(drug_id);
              $.ajax({
                  url: "{{route('drug_fetch_indication')}}",
                  type: "POST",
                  data: {
                      drug_id: drug_id,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					     document.getElementById('indication').innerHTML = (response.result);
                  },
              });
      }
    //   gender
    	   function selectGender() {
              var gender_id = document.getElementById('gender').value;
              var block = document.getElementById('block');
              console.log(gender_id);
              if (gender_id === "2") {
                    block.style.display = "block";
                } else {
                    block.style.display = "none";
                }
      }

</script>
</html>