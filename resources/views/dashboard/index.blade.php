<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

    #welcomePopup {
        animation: fadeIn 0.5s ease-in-out;
    }

    #welcomePopup.hidden {
        animation: fadeOut 0.5s ease-in-out;
    }
</style>
<div class="row mb-7">
    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1.25C1.80109 1.25 1.61032 1.32902 1.46967 1.46967C1.32902 1.61032 1.25 1.80109 1.25 2C1.25 2.19891 1.32902 2.38968 1.46967 2.53033C1.61032 2.67098 1.80109 2.75 2 2.75H4V12.277C4 13.617 4 14.287 4.268 14.878C4.536 15.469 5.04 15.91 6.049 16.793L8.049 18.543C9.932 20.19 10.873 21.013 12 21.013C13.127 21.013 14.069 20.19 15.951 18.543L17.951 16.793C18.959 15.91 19.464 15.469 19.731 14.878C20 14.288 20 13.618 20 12.278V2.75H22C22.1989 2.75 22.3897 2.67098 22.5303 2.53033C22.671 2.38968 22.75 2.19891 22.75 2C22.75 1.80109 22.671 1.61032 22.5303 1.46967C22.3897 1.32902 22.1989 1.25 22 1.25H2ZM8.5 12.25C8.30109 12.25 8.11032 12.329 7.96967 12.4697C7.82902 12.6103 7.75 12.8011 7.75 13C7.75 13.1989 7.82902 13.3897 7.96967 13.5303C8.11032 13.671 8.30109 13.75 8.5 13.75H15.5C15.6989 13.75 15.8897 13.671 16.0303 13.5303C16.171 13.3897 16.25 13.1989 16.25 13C16.25 12.8011 16.171 12.6103 16.0303 12.4697C15.8897 12.329 15.6989 12.25 15.5 12.25H8.5ZM7.75 8C7.75 7.80109 7.82902 7.61032 7.96967 7.46967C8.11032 7.32902 8.30109 7.25 8.5 7.25H15.5C15.6989 7.25 15.8897 7.32902 16.0303 7.46967C16.171 7.61032 16.25 7.80109 16.25 8C16.25 8.19891 16.171 8.38968 16.0303 8.53033C15.8897 8.67098 15.6989 8.75 15.5 8.75H8.5C8.30109 8.75 8.11032 8.67098 7.96967 8.53033C7.82902 8.38968 7.75 8.19891 7.75 8Z" fill="#188BC1"/>
                      </svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 4C13.0609 4 14.0783 4.42143 14.8284 5.17157C15.5786 5.92172 16 6.93913 16 8C16 9.06087 15.5786 10.0783 14.8284 10.8284C14.0783 11.5786 13.0609 12 12 12C10.9391 12 9.92172 11.5786 9.17157 10.8284C8.42143 10.0783 8 9.06087 8 8C8 6.93913 8.42143 5.92172 9.17157 5.17157C9.92172 4.42143 10.9391 4 12 4ZM12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" fill="#188BC1"/>
                      </svg>                </div>
                <h1 class="m-0 align-self-center ms-3 text-gray-700">3.982</h1>
            </div>
            <p>Total Registered Applicants</p>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">

            <div class="d-flex">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                        <g clip-path="url(#clip0_179_3968)">
                          <path d="M9 10C11.7617 10 14 7.76172 14 5C14 2.23828 11.7617 0 9 0C6.23828 0 4 2.23828 4 5C4 7.76172 6.23828 10 9 10ZM12.7422 11.2734L10.875 18.75L9.625 13.4375L10.875 11.25H7.125L8.375 13.4375L7.125 18.75L5.25781 11.2734C2.47266 11.4062 0.25 13.6836 0.25 16.5V18.125C0.25 19.1602 1.08984 20 2.125 20H15.875C16.9102 20 17.75 19.1602 17.75 18.125V16.5C17.75 13.6836 15.5273 11.4062 12.7422 11.2734Z" fill="#188BC1"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_179_3968">
                            <rect width="17.5" height="20" fill="white" transform="translate(0.25)"/>
                          </clipPath>
                        </defs>
                      </svg>                </div>
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
        <div id="totalapplicants" class="h-100 mt-2" ></div>
    </div>
</div>


<div class="mb-9 d-flex">
    <div class="col-12 col-xl-4">
        <div class="card card-bordered mb-10 me-3">
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

    <div class="col-12 col-xl-8 card card-bordered mb-10">
        <div class="bg-white p-7  m-3">

            <div class="d-flex justify-content-between">
                <div class="">
                    <h2 class="">Total of Accepted and Rejected Applicants</h2>
                </div>
            </div>
            <small>Top 10 Companies</small>

            <div id="totalacc" class="h-100"></div>

        </div>
    </div>
@include('dashboard.javascript')
