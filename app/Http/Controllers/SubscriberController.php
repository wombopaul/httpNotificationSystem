<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Traits\BaseResponse;

class SubscriberController extends Controller
{

    use BaseResponse;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = Subscriber::updateOrCreate([
            'topic' => $request->topic,
            'url' => $request->url
        ]);

        return $this->successResponse(new SubscriberResource($subscriber));
    }





}
