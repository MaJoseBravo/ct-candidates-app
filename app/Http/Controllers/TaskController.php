<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('order', 'ASC')->get();
        // $tasks = Task::orderBy('order', 'ASC')->paginate(3);


        $response = [
            'status' => 'true',
            'data' => $tasks,
            'errors' => [],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$order = Task::count('title');
         $campos= array('title'=>$request->title,'order'=>$this->latestId()+1);
        $validated = Validator::make($campos, [
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:1|max:100',
            'order'=>'required'
        ], [
            'title.regex' => 'Title only accepts characters, numbers and spaces'
        ]);

        if ($validated->fails()) {
            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => $validated->errors(),
            ];
        } else {
            Task::create($validated->validated());
            $tasks = Task::orderBy('order', 'ASC')->get();
            $response = [
                'status' => 'true',
                'data' => $tasks,
                'errors' => [],
            ];
        }

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos= array('isCompleted'=>$request->isCompleted);
        $validated = Validator::make($campos, [
            'isCompleted' => 'required|boolean'
        ]);
        if ($validated->fails()) {

            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => $validated->errors(),
            ];
        } else {
            Task::where('id', $id)->update($validated->validated());

            $response = [
                'status' => 'true',
                'data' => [],
                'errors' => [],
            ];
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTask = Task::where('id', $id)->delete();

        if (!$deleteTask) {
            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => [],
            ];
        } else {
            $tasks = Task::orderBy('order', 'ASC')->get();
            $response = [
                'status' => 'true',
                'data' => $tasks,
                'errors' => [],
            ];
        }

        return response()->json($response);
    }


    public function filter(Request $request)
    {
        $filter=$request->filter;
        if ($filter=="complete") {
            $tasks = Task::where('isCompleted','=',1)->orderBy('order', 'ASC')->get();
        }elseif($filter=="incomplete"){
            $tasks = Task::where('isCompleted','=',0)->orderBy('order', 'ASC')->get();
        }else{
            $tasks = Task::orderBy('order', 'ASC')->get();
        }
        // print_r($filter."dddddddddddd");
       

        $response = [
            'status' => 'true',
            'data' => $tasks,
            'errors' => [],
        ];

        return response()->json($response);
    }

    public function latestId(){
        $lastid = Task::all()->sortByDesc('created_at')->take(1)->toArray();
        if (count($lastid)==0) {
            $taskId=1;
        }else{
            foreach ($lastid as $value) {
                $taskId=($value["id"]);
            }
           
        }
       
        return $taskId;
    }

    
}
