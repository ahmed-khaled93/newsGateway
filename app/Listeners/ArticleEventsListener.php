<?php

namespace App\Listeners;

use App\Events\ArticleEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EventHistory;
use Auth;

class ArticleEventsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleEvents  $event
     * @return void
     */
    public function handle(ArticleEvents $event)
    {
        // dd($event->article[0]=='CreateArticle');
        if($event->article[0]=='CreateArticle')
        {
            session()->flash('CreateArticle', 'Article Created Successfully');

            $user = Auth::user();

            $event = new EventHistory();
            $event->user_id = $user->id;
            $event->eventName = 'Create Article';

            $event->save();
        }
        elseif ($event->article[0]=='UpdateArticle')
        {
            session()->flash('UpdateArticle', 'Article Updated Successfully');
            $user = Auth::user();

            $event = new EventHistory();
            $event->user_id = $user->id;
            $event->eventName = 'Update Article ';

            $event->save();
        }
        elseif ($event->article[0]=='DeleteArticle') 
        {
            session()->flash('DeleteArticle', 'Article Deleted');
            $user = Auth::user();

            $event = new EventHistory();
            $event->user_id = $user->id;
            $event->eventName = 'Delete Article ';

            $event->save();
        }
        
        // $event->article['message'].'just Added';
        
        // $user = Auth::user();

        // $event = new EventHistory();
        // $event->user_id = $user->id;
        // $event->eventName = 'Article Created';

        // $event->save();

    }

}
