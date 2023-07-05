<div class="row mb-7">
    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex">
                <div class="">
                    <i class="las la-cube fs-1"></i>
                </div>
                <h1 class="m-0 align-self-center ms-3 text-gray-700">2.412</h1>
            </div>
            <p>Total Registered Lockers</p>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex">
                <div class="">
                    <i class="las la-cube fs-1"></i>
                </div>
                <h1 class="m-0 align-self-center ms-3 text-gray-700">3.982</h1>
            </div>
            <p>Total Registered Applicants</p>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex">
                <div class="">
                    <i class="las la-cube fs-1"></i>
                </div>
                <h1 class="m-0 align-self-center ms-3 text-gray-700">1.300</h1>
            </div>
            <p>Total Listed Companies</p>
        </div>
    </div>
</div>

<div class="card card-bordered mb-10" >
    <div class="card-body">
        <div class="d-flex align-items-start">
            <div class="me-auto me-3">
                <h2>Total Registered Applicants</h2>
            </div>
            <div class="d-flex align-items-center">
                <div class="position-relative">
                    <select name="select_bulan" id="select_bulan" class="form-select form-select-solid" style="width: 100px;">
                        <option value="" selected disabled hidden>Tahun</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="totalapplicants" style="height: 500px;" ></div>
    </div>
</div>


<div class="row mb-9">
    <div class="col-12 col-xl-4">
        <div class="card card-bordered mb-10">
            <div class="card-body">
                <div class="table-responsive" id="informasi" >
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex flex-column">
                            <h2 class="me-3">Company of Interest to Applicants</h2>
                            <span class="text-gray-400 mt-1  fw-semibold fs-6">Top 10 Companies
                            </span>
                        </div>                    
                     
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle rounded tdFirstCenter"
                            id="tableTopSeller">
                            <thead>
                                <tr class="fw-bolder">
                                    <th class="ps-4" width="20">No</th>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Total Applicants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="display-flex" style="justify-content: flex-start;" style="align-items: center">
                                    <td class="ps-4" width="20">1</td>
                                    <td><img src="/assets/media/avatars/blank.png" class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>PT Neraca Abadi</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>246</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;" style="align-items: center">
                                    <td class="ps-4" width="20">2</td>
                                    <td><img src="/assets/media/avatars/blank.png" class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Obdi Corp</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>238</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;" style="align-items: center">
                                    <td class="ps-4" width="20">3</td>
                                    <td><img src="/assets/media/avatars/blank.png" class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Sushi Bersinar</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>219</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;" style="align-items: center">
                                    <td class="ps-4" width="20">4</td>
                                    <td><img src="/assets/media/avatars/blank.png" class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>PT Sumber Mega</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>208</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;" style="align-items: center">
                                    <td class="ps-4" width="20">5</td>
                                    <td><img src="/assets/media/avatars/blank.png" class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Hohobiz</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>201</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

    <div class="col-12 col-xl-8">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex justify-content-between">
                <div class="">
                    <h2 class="">Total of Accepted and Rejected Applicants</h2>
                </div>
            </div>
            <small>Top 10 Companies</small>

            <div id="totalacc" style="height: 500px;" ></div>

        </div>
    </div>
@include('dashboard.javascript')
