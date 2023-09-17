<div class="row" data-roleable="true" data-role="Profile-Read">

    <div class="col-xl-3">
        <div class="card rounded-2 shadow-sm">
            <div class="card-body p-5">
                <a href="javascript:" class="profileMenu btn w-100 btn-primary mb-2" style="background-color:#117CB2;"
                    onclick="changeMenu('profile',this)">
                    <div class="text-start fw-bold"><i style="color: inherit;" class="las fs-1 la-user"></i>Data Pribadi
                    </div>
                </a>
                <a href="javascript:" class="profileMenu btn w-100 text-gray-900"
                    onclick="changeMenu('password',this)">
                    <div class="text-start fw-bold"><i style="color: inherit;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M13.0571 12.6474L12.6139 12.6228L12.5369 13.0599C12.0358 15.9041 9.55267 18.0647 6.56522 18.0647C3.21568 18.0647 0.5 15.349 0.5 11.9995C0.5 8.65006 3.21561 5.93506 6.56522 5.93506C9.39069 5.93506 11.7656 7.86746 12.4387 10.4836L12.5443 10.894L12.9621 10.8575H23.5V12.6482H22.4727H21.9727V13.1482V17.9296H20.182V13.1482V12.6482H19.682H18.3661H17.8661V13.1482V16.2974H16.0753V13.1482V12.6482H15.5753H13.0686C13.0651 12.6479 13.0612 12.6477 13.0571 12.6474ZM10.5926 11.9995C10.5926 9.77508 8.78966 7.97212 6.56522 7.97212C4.34094 7.97212 2.53706 9.77494 2.53706 11.9995C2.53706 14.2239 4.34078 16.0277 6.56522 16.0277C8.7898 16.0277 10.5926 14.2238 10.5926 11.9995Z" stroke="#344054"/>
                      </svg></i>Ubah Password
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="card shadow-sm rounded-3">
            <ul class="nav nav-tabs d-none" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="ubahProfile-tab" data-bs-toggle="tab"
                        data-bs-target="#ubahProfile" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Ubah Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ubahPassword-tab" data-bs-toggle="tab" data-bs-target="#ubahPassword"
                        type="button" role="tab" aria-controls="password" aria-selected="false">Ubah
                        Password</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="logActivity-tab" data-bs-toggle="tab" data-bs-target="#logActivity"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Log Aktivitas
                        Saya</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="ubahProfile" role="tabpanel" aria-labelledby="home-tab">
                    @include('profile.form')
                </div>
                <div class="tab-pane fade" id="ubahPassword" role="tabpanel" aria-labelledby="password-tab">
                    @include('profile.changepw')
                </div>
                <div class="tab-pane fade" id="logActivity" role="tabpanel" aria-labelledby="profile-tab">
                    {{-- @include('profile.logActivity') --}}
                </div>
            </div>
        </div>
    </div>

</div>


@include('profile.javascript')