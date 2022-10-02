<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryDeleteRequest;
use App\Http\Requests\CountryShowRequest;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Services\CountryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Attributes as OA;;

#[OA\Info(
    version: "1.0.0",
    title: "Laravel examination",
)]
class CountryController extends Controller
{
    #[OA\Get(
        path: "/api/country/all", description: "Get the list of all countries",
        responses: [
            new OA\Response(response: 200, description: "Successful")
        ]
    )]

    public function index(CountryService $service)
    {
        return $service->getAllCountries();
    }

    #[OA\Get(
        path: "/api/country/show", description: "Get exact country",
        responses: [
            new OA\Response(response: 200, description: "Successful"),
            new OA\Response(response: 404, description: "Not found"),
            new OA\Response(response: 416, description: "Range not satisfiable"),
            new OA\Response(response: 415, description: "Unsupported mediatype"),
            new OA\Response(response: 422, description: "Unprocessable content"),
        ]
    )]
    #[OA\Parameter(name: 'id', in: 'query')]
    public function show(CountryShowRequest $request, CountryService $service)
    {
        return $service->getCountryById($request);
    }

    #[OA\Post(
        path: "/api/country/store", description: "Create new record with country information",
        responses: [
            new OA\Response(response: 200, description: "Successful"),
            new OA\Response(response: 416, description: "Range not satisfiable"),
            new OA\Response(response: 415, description: "Unsupported mediatype"),
            new OA\Response(response: 422, description: "Unprocessable content"),
        ]
    )]
    #[OA\Parameter(name: 'alias', in: 'query')]
    #[OA\Parameter(name: 'name', in: 'query')]
    public function store(CountryStoreRequest $request, CountryService $service)
    {
        return $service->createCountry($request);
    }

    #[OA\Put(
        path: "/api/country/update", description: "Update existing records about the country",
        responses: [
            new OA\Response(response: 200, description: "Successful"),
            new OA\Response(response: 404, description: "Not found"),
            new OA\Response(response: 416, description: "Range not satisfiable"),
            new OA\Response(response: 415, description: "Unsupported mediatype"),
            new OA\Response(response: 422, description: "Unprocessable content"),
        ]
    )]
    #[OA\Parameter(name: 'id', in: 'query')]
    #[OA\Parameter(name: 'alias', in: 'query')]
    #[OA\Parameter(name: 'name', in: 'query')]
    public function update(CountryUpdateRequest $request, CountryService $service)
    {
        return $service->updateCountry($request);
    }

    #[OA\Delete(
        path: "/api/country/delete", description: "Delete a country record",
        responses: [
            new OA\Response(response: 200, description: "Successful"),
            new OA\Response(response: 404, description: "Not found"),
            new OA\Response(response: 415, description: "Unsupported mediatype"),
            new OA\Response(response: 416, description: "Range not satisfiable"),
            new OA\Response(response: 422, description: "Unprocessable content"),
        ]
    )]
    #[OA\Parameter(name: 'id', in: 'query')]
    public function delete(CountryDeleteRequest $request, CountryService $service)
    {
        return $service->deleteCountry($request);
    }
}
