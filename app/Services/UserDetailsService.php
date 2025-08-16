<?php

namespace App\Services;

use App\Models\{
    UserDetails
};

class UserDetailsService
{
    protected $service;
    public function __construct(UserDetails $userDetails)
    {
        $this->service = $userDetails;
    }
    public function table($type = null)
    {
        return $this->service->select('*');
    }
    public function select()
    {
        return $this->service;
    }
    public function paginate($request)
    {
        return $this->service->paginate(pagination($request->per_page));
    }

    public function update($request, $service)
    {
        if (!is_object($service)) {
            $service = $this->get($service);
        }
        $service->dob = $request->input('dob');
        $service->location = $request->input('location');
        $service->city = $request->input('city');
        $service->state = $request->input('state');
        $service->country = $request->input('country');
        $service->pin_code = $request->input('pin_code');
        $service->facebook = $request->input('facebook');
        $service->linkedin = $request->input('linkedin');
        $service->instagram = $request->input('instagram');
        $service->education = $request->input('education');
        $service->languages = $request->input('languages');
        $service->experience = $request->input('experience');
        $service->expertise = $request->input('expertise');
        $service->about = $request->input('about');
        $service->price = $request->input('price');
        $service->service = $request->input('service');
        $service->rating = $request->input('rating');
        $service->save();

        return $service;
    }
    
}
