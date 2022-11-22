<?php

namespace App\Observers;

use App\Models\Publisher;
use App\Models\Subscriber;
use Spatie\WebhookServer\WebhookCall;

class PublisherObserver
{
    /**
     * Handle the Publisher "created" event.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return void
     */
    public function created(Publisher $publisher)
    {
        //check if there are any subscribers to the topic
        $subscribers = Subscriber::where('topic', $publisher->topic)->get();

        if($subscribers){
            // call webhook here to send TTTP request to any subscribers

            foreach($subscribers as $subscriber){

                    WebhookCall::create()
                    ->url($subscriber->url . '/' . $publisher->topic . '/webhook-receiving-url')
                    ->payload(['topic' => $publisher->topic,
                                'data' => ['msg' => $publisher->data]
                            ])
                    ->useSecret('secretKey')
                    ->dispatch();
            }

                //$publisher->test = "Ayanxi";
        }
    }

    /**
     * Handle the Publisher "updated" event.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return void
     */
    public function updated(Publisher $publisher)
    {
        //
    }

    /**
     * Handle the Publisher "deleted" event.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return void
     */
    public function deleted(Publisher $publisher)
    {
        //
    }

    /**
     * Handle the Publisher "restored" event.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return void
     */
    public function restored(Publisher $publisher)
    {
        //
    }

    /**
     * Handle the Publisher "force deleted" event.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return void
     */
    public function forceDeleted(Publisher $publisher)
    {
        //
    }
}
