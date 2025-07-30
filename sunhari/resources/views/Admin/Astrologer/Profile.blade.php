<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold py-3 mb-0 pull-left">Profile Details</h4>
                        <a class="text-muted float-end" href="{{ route('updateAstrologerDetails') }}"><button
                                type="button" class="btn btn-primary">Update Profile</button></a>
                    </div>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if (isset($user->photo))
                                <img src="{{ publicPath($user->photo) }}" alt="{{ $user->name }}_photo"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="../assets/img/avatars/1.png" alt="{{ $user->name }}_photo"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif
                        </div>
                    </div>
                    <hr class="my-0" />
                    <h5 class="card-header">Basic Info</h5>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><small class="text-light fw-semibold">Name</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $user->name ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Email</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $user->email ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Phone Number</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $user->phone ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Date of Birth</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $myDetails->dob ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Gender</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $myDetails->gender ?? 'Update Your Profile' }}</em>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Address</small></td>
                                    <td class="py-3">
                                        @if (isset($myDetails->location))
                                            <p class="mb-0"><em>{{ $myDetails->location }},
                                                    {{ $myDetails->city }}, {{ $myDetails->state }},
                                                    {{ $myDetails->pin_code }}, {{ $myDetails->country }}</em></p>
                                        @else
                                            <p class="mb-0"><em>Update Your Profile</em></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">FaceBook Id</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->facebook ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">InstaGram Id</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->instagram ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">LinkedIn Id</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->linkedin ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Education</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->education ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Supported Languages</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->languages ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Years Of Experience</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->experience ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Expertise</small></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                            <em>{{ $myDetails->expertise ?? 'Update Your Profile' }}</em></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">About Me</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $myDetails->about ?? 'Update Your Profile' }}</em>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Services</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $myDetails->service ?? 'Update Your Profile' }}</em>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-light fw-semibold">Service Price</small></td>
                                    <td class="py-3">
                                        <p class="mb-0"><em>{{ $myDetails->price ?? 'Update Your Profile' }} /- min</em>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
