<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            "product_name"=>$this->product_name,
            "price"=>$this->product_price."$",
            'category'=>$this->category->category_name,
            'auther'=>new AutherResource($this->auther)
        ];
    }
}
