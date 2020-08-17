<?php

namespace App\Listeners;


use App\Events\TaskSend;
use App\Mail\SendEmailWithTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TaskCreatedSendNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {

    }

    /**
     * @param TaskSend $event
     */
    public function handle(TaskSend $event)
    {

        $to = trim($event->task->mailTo()['email']);
        Mail::to($to )
            ->queue(new SendEmailWithTask($event->task));

        $event->task->deActive();
    }

    /**
     * @param TaskSend $event
     * @param $exception
     */
    public function failed(TaskSend $event, $exception)
    {
        $event->task->error($exception->getMessage());
        $event->task->active();
    }
}
