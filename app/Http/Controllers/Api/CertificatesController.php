<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateListResource;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page;
        $certificates = QueryBuilder::for(Certificate::class)
            ->with(['activity', 'award'])
            ->allowedFilters(['name', 'activity.name', AllowedFilter::exact('award.id'), AllowedFilter::exact('code')])
            ->defaultSort('-created_at')
            ->paginate($per_page);

        return CertificateListResource::collection($certificates);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {

        $certificate = Certificate::firstWhere('code', $code);
        return new CertificateResource($certificate);
    }

}
