<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'id' => $this->id,
            'acct_no' => $this->acct_no,
            'acct_name' => $this->acct_name,
            'bank_name' => $this->bank_name,
            'bank_code' => $this->bank_code,
            'bank_id' => $this->bank_id,
            'user' => $this->user_id
        ];
    }
}
