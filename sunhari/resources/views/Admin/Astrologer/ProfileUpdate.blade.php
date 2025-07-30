<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        {{ Form::open(['route' => ['astrologerDetailsUpdate', $user->user_id], 'method' => 'POST']) }}
                        @csrf
                        <div class="row">
                            <div class="col-md-10 imageUploadGroup">
                                <img src="{{ asset($user->photo) }}" class="file-upload" id="photo-img"
                                    style="width: 100px; height: 100px;">
                                <button type="button" data-eid="photo" class="btn btn-success setFeaturedImage">Select
                                    image</button>
                                <button type="button" data-eid="photo"
                                    class="btn btn-warning removeFeaturedImage">Remove image</button>
                                <input type="hidden" name="photo" id="photo" value="">
                            </div>
                            <div class="row mb-3" hidden>
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Role</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach (userTypes() as $roleKey => $roleValue)
                                                <option value="{{ $roleKey }}"
                                                    {{ $roleKey == $user->role ? 'selected' : '' }}>{{ $roleValue }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $user->name ?? old('name') }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $user->email ?? old('email') }}" placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <select id="phone_code" class="form-select" name="phone_code">
                                            <option value="{{ $user->phone_code ?? old('phone_code') }}">{{ $user->phone_code ?? "Select Code" }}</option>
                                            @foreach ($pinCode as $code)
                                                <option value="{{ $code->phonecode ?? old('phone_code') }}">
                                                    +{{ $code->phonecode }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ $user->phone ?? old('phone') }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="{{ $userDetails->dob ?? old('dob') }}" placeholder="dob" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="facebook" class="form-label">Facebook Id</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ $userDetails->facebook ?? old('facebook') }}" placeholder="facebook" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="instagram" class="form-label">Instagram Id</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ $userDetails->instagram ?? old('instagram') }}" placeholder="instagram" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="linkedin" class="form-label">LinkedIn Id</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ $userDetails->linkedin ?? old('linkedin') }}" placeholder="linkedin" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="location" class="form-label">Area/Street/Landmark</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $userDetails->location ?? old('location') }}" placeholder="Area/Street/Landmark" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input class="form-control" type="text" id="city" name="city"
                                    value="{{ $userDetails->city ?? old('city') }}" placeholder="city" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="state" class="form-label">State</label>
                                <input class="form-control" type="text" id="state" name="state"
                                    value="{{ $userDetails->state ?? old('state') }}" placeholder="state" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    value="{{ $userDetails->country ?? old('country') }}" placeholder="Country" />
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="pin_code" class="form-label">Pin Code</label>
                                <input type="text" class="form-control" id="pin_code" name="pin_code"
                                    value="{{ $userDetails->pin_code ?? old('pin_code') }}" placeholder="Pin Code" />
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="education" class="form-label">Education</label>
                                <input type="text" class="form-control" id="education" name="education"
                                    value="{{ $userDetails->education ?? old('education') }}" placeholder="Education" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="languages" class="form-label">Preferred Language</label>
                                <input type="text" class="form-control" id="languages" name="languages"
                                    value="{{ $userDetails->languages ?? old('languages') }}" placeholder="Preferred Language" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    value="{{ $userDetails->experience ?? old('experience') }}" placeholder="Experience" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="expertise" class="form-label">Expertise</label>
                                <input type="text" class="form-control" id="expertise" name="expertise"
                                    value="{{ $userDetails->expertise ?? old('expertise') }}" placeholder="Expertise" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="price" class="form-label">Service Price / min</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $userDetails->price ?? old('price') }}" placeholder="Service Price / min" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="service" class="form-label">Services Offered</label>
                                <input type="text" class="form-control" id="service" name="service"
                                    value="{{ $userDetails->service ?? old('service') }}" placeholder="Services Offered" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" class="form-control" id="rating" name="rating"
                                    value="{{ $userDetails->rating ?? old('rating') }}" placeholder="Rating" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="about" class="form-label">About Me</label>
                                <textarea class="form-control" id="about" name="about" placeholder="about">{{ $userDetails->about ?? old('about') }}</textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="password" id="basic-default-email"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
