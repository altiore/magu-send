<?php

namespace App\Entity;

use App\Events\TaskSend;
use Illuminate\Database\Eloquent\Model;
use function MongoDB\BSON\toJSON;

/**

 * @property string $status

 */
class Task extends Model
{
    protected $table = 'tasks';
    const TASK_ACTIVE = 'active';
    const TASK_NOTACTIVE = 'done';

    protected $fillable = [
        'from', 'to', 'html', 'subject', 'error'
    ];

    protected $dispatchesEvents = [
        'created' => TaskSend::class
    ];

    public static function new( Object $data)
    {

        if('object' === gettype($data->from)) {
//            $data->from = json_encode($data->from, JSON_UNESCAPED_UNICODE, JSON_UNESCAPED_SLASHES );
            $data->from = 'email: ' . $data->from->email . ', name: ' . $data->from->name ;
        }
        if('object' === gettype($data->to)) {
//            $data->to = json_encode($data->to, JSON_UNESCAPED_UNICODE, JSON_UNESCAPED_SLASHES );
            $data->to = 'email: ' . $data->to->email . ', name: ' . $data->to->name ;
        }
        $task =  self::create([
            'from' => $data->from,
            'to' => $data->to,
            'html' => $data->html,
            'subject' => $data->subject,
        ]);

        return $task;

    }

    public function mailTo()
    {
        $array = explode(',', $this->to);
        $arrayData=[];
        foreach ($array as $data) {
            $nameKey = explode(':', $data);
            $arrayData[trim($nameKey[0])] = $nameKey[1];
        }
        return $arrayData;
    }

    public function mailFrom()
    {
        $array = explode(',', $this->from);
        $arrayData=[];

        foreach ($array as $data) {
            $nameKey = explode(':', $data);
            $arrayData[trim($nameKey[0])] = $nameKey[1];
        }

        return $arrayData;
    }

    public function mailSubject() {
        return $this->subject;
    }

    public function mailHtml() {
        return $this->html;
    }

    public function isActive(): bool
    {
        return $this->status === self::TASK_ACTIVE;
    }

    public function deActive()
    {
         $this->status = self::TASK_NOTACTIVE;
         $this->save();
    }

    public function active()
    {
         $this->status = self::TASK_ACTIVE;
         $this->save();
    }

    public function error($e)
    {
        $this->error = $e;
        $this->save();
    }

}
