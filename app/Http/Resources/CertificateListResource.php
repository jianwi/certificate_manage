<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'activity' => $this->activity->name,
            'name' => $this->name,
            'award' => $this->award->name,
            'created_at' => Carbon::parse($this->created_at)->toDateString(),
        ];
    }
}
