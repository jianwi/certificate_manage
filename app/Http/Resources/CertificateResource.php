<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->type == 2){
            $template = $this->template;
        }else{
            $template = $this->activity->template->content;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'template' => $template,
            'award' => $this->award->name,
            'code' => $this->code,
            'text' => [
                'text1' => $this->text1,
                'text2' => $this->text2,
                'text3' => $this->text3,
                'text4' => $this->text4,
                'text5' => $this->text5,
                'text6' => $this->text6,
                'text7' => $this->text7,
                'text8' => $this->text8,
                'code'  => $this->code,
                'qr_code' => route('qrcode',$this->code)
            ],
        ];
    }
}
