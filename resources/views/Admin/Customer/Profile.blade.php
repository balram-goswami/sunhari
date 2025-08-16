<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold py-3 mb-0 pull-left">Profile Details</h4>
                        <a class="text-muted float-end" href="{{ route('updateUserDetails') }}"><button type="button"
                                class="btn btn-primary">Update Profile</button></a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if (isset($user->photo))
                                <img src="{{ publicPath($user->photo) }}" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar" />
                            @endif
                        </div>
                    </div>
                    <hr class="my-0" />
                    <h5 class="card-header">Basic Details</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Full Name</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $user->name ?? 'Update Name' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Email Address</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $user->email ?? 'Update Email Id' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Phone Number</label>
                                <input class="form-control" type="text" readonly
                                    value="+{{$user->phone_code}} - {{ $user->phone ?? 'Update Phone Number' }}" />
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Date Of Birth</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $userDetails->dob ?? 'Update Date Of Birth' }}" />
                            </div>

                        </div>
                    </div>

                    <hr class="my-0" />
                    <h5 class="card-header">Address Details</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Street/Landmark</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $userDetails->location ?? 'Update Address' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">City</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $userDetails->city ?? 'Update Address' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">State</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $userDetails->state ?? 'Update Address' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Pin Code</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $userDetails->pin_code ?? 'Update Pin Code' }}" />
                            </div>

                        </div>
                    </div>
                </div>


                {{-- <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
              <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                  <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                  <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                </div>
              </div>
              <form id="formAccountDeactivation" onsubmit="return false">
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="accountActivation"
                    id="accountActivation"
                  />
                  <label class="form-check-label" for="accountActivation"
                    >I confirm my account deactivation</label
                  >
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
              </form>
            </div>
          </div> --}}
            </div>
        </div>
    </div>
