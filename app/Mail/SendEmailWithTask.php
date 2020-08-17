<?php

namespace App\Mail;

use App\Entity\Task;
use function GuzzleHttp\Psr7\str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailWithTask extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    /**
     * Create a new message instance.
     *
     * @return Task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(trim($this->task->mailFrom()['email']) )
            ->subject($this->task->mailSubject())
//            ->text($this->task->mailHtml())
            ->view('emails.task-new')// оригинал view.
            ->text('emails.task-text');

    }
}
