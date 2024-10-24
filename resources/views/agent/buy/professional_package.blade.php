@extends('agent.agent_dashboard')

@section('agent')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Special pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
    </nav>
    <form class="forms-sample" method="POST" action="{{route('buy.professional.package')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 ps-0">
                                <a href="#" class="noble-ui-logo logo-light d-block mt-3">Noble<span>UI</span></a>
                                <p class="mt-1 mb-1"><b>NobleUI Themes</b></p>
                                <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                                <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                                <p>Joseph E Carr,<br> 102, 102 Crown Street,<br> London, W3 3PR.</p>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
                                <h6 class="text-end mb-5 pb-4"># INV-002308</h6>
                                <p class="text-end mb-1">Balance Due</p>
                                <h4 class="text-end fw-normal">$ 72,420.00</h4>
                                <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Invoice Date :</span> 25rd Jan 2022</h6>
                                <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2022</h6>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>package_name</th>
                                            <th class="text-end">package_amount</th>
                                            <th class="text-end">package_credits</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-end">
                                            <td>1</td>
                                            <td class="text-start">Professional</td>
                                            <td class="text-start">50</td>

                                            <td>10</td>
                                            <td>50</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end">$50</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-bold-800">Total</td>
                                                    <td class="text-bold-800 text-end"> $50</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            <button type="submit" class="btn btn-primary submit my-3">Submit form</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection