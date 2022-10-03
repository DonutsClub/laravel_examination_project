<?php

namespace App\Services;

use App\Http\Requests\CountryDeleteRequest;
use App\Http\Requests\CountryShowRequest;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class CountryService
{
    public function getAllCountries()
    {
        return response()->json(Country::all(), 200);
    }

    public function getCountryById($request)
    {
        $country = Country::find($request->id);
        if($country === null)
        {
            return response('', 404);
        }

        return new CountryResource($country);
    }

    public function updateCountry($request)
    {
        $country = Country::find($request->id);
        if($country === null)
        {
            return response('Record not found', 404);
        }

        if($this->isNumericValidation($request) !== true)
        {
            return $this->isNumericValidation($request);
        }

        $country->id = $request->id;
        $country->alias = $request->alias;
        $country->name = $request->name;
        $country->save();
        return new CountryResource($country);
    }

    public function createCountry($request)
    {
        if($this->isNumericValidation($request) !== true)
        {
            return $this->isNumericValidation($request);
        }

        $country = Country::create([
            'alias' => $request->alias,
            'name' => $request->name
        ]);
        return new CountryResource($country);
    }

    public function deleteCountry($request)
    {
        $country = Country::find($request->id);
        if($country === null)
        {
            return response('', 404);
        }

        Country::where('id', '=', $request->id)->delete();
        return new CountryResource($country);
    }

    public function isNumericValidation($request)
    {
        $model = $request->validated();
        $alias = $model['alias'];
        $name = $model['name'];

        if(is_numeric($alias))
        {
            return response('Alias must not be a number', 415);
        }

        if(is_numeric($name))
        {
            return response('Name must not be a number', 415);
        }

        return true;
    }

}
