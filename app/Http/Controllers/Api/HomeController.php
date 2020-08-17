<?php

namespace App\Http\Controllers\Api;

use App\Entity\Task;
use App\Events\TaskSend;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminMiddleware;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $request;
//    protected $user;
//
//    public function __construct( User $user)
//    {
//        $this->user = $user;
//    }

    public function home(Request $request)
    {
        if(!$request->user()->isAdmin()) return ['Что то не по нраву вы мне)'];

        $request->validate([
            'to' => 'required',
            'from' => 'required',
            'html' => 'required',
            'subject' => 'required'
        ]);

        if($request->isJson()) {

            try {
                $data = json_decode($request->getContent());
                $task = Task::new($data);
                return response()->json( [
                    $task,
//                    'id' => $task->id,
//                    'from'=> $task->from,
//                    'to'=> $task->to,
//                    'html' => $task->html,
//                    'subject' => $task->subject
]);
            } catch (\Exception $e) {
                return ['Выброшено исключение: ', $e->getMessage(), "\n"];
            }

        }
        return ['Что то не по нраву вы мне)'];
    }

}
