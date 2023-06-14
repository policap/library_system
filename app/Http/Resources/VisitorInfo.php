<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitorInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $parent=$this;
        return[
           'date_created_at'=>$parent->date_created_at,
           'name'=>$parent->name,
           'username'=>$parent->username,
           'phone_number'=>$parent->phone_number,
           'books_read'=>$parent->visitorbook()->where('visitors_books.action', 'read')->get(),
            'books_liked'=>$parent->visitorbook()->where('visitors_books.action', 'like')->get(),
            'reading_list'=>$parent->visitorbook()->where('visitors_books.action', 'save')->get(),
            'account_duration'=>now()->diffInDays(\Date::parse($parent->created_at)),
            //'signed_books'=>'',
            //'recommended_books'=>'',

        ];
    }
}
