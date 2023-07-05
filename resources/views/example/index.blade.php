<div class="row mb-7">
    <div class="">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">
            <div class="d-flex">
                <div class="d-flex align-items-center">
                    {{-- <input type="date" class="btn btn-sm btn-light btn-active-light-primary ms-4 h-50px w-141px" id="" name=""> --}}
                    {{-- <a href="#" class="btn btn-sm btn-light btn-active-light-primary ms-2 w-145px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Status
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                    </a> --}}
                </div>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="align-self-center fs-2 las la-search"></i>
                    </span>
                <input type="search" name="search_example" id="search_example" placeholder="Search Here!" class="form-control" autocomplete="off">
                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#kt_modal_add_example">Click Here To Add Data!</button>

            </div>
         </div>
            
        </div>
    </div>
</div>

<div class="card">
    <!--begin::Card header-->
  
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
       
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-example">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Code</th>
                    <th class="min-w-125px">Name</th>
                    <th class="min-w-125px">Active</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="fw-bold text-gray-600">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_example" tabindex="-1" aria-hidden="true"> 
    @include('example.form')
</div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Include the jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    

@include('example.javascript')
