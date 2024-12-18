<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StasiunResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'jenis_perjalanan' => $this->jenis_perjalanan
        ];
    }
}
