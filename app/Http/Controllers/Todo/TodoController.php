<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get("query", false);
        $sort = $request->get("sort", "up");
        // dd($query);
        if ($query) {
            // $todos = Todo::where("title", "like", "%$query%");
            $todos = Todo::with("category")->where("id", "like", "%$query%");
            $todos->orWhere("title", "like", "%$query%");
        } else {
            $todos = Todo::with("category");
        }
        // dd($todos);

        if ($sort == "upId")
            $todos->orderBy("id", "asc");
        else if ($sort == "downId")
            $todos->orderBy("id", "desc");
        else if ($sort == "upTitle")
            $todos->orderBy("title", "asc");
        else if ($sort == "downTitle")
            $todos->orderBy("title", "desc");

        // dd($todos->toSql());
        $todos = $todos->get();

        return view("todos.index")->with(["todos" => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view("todos.create")->with(compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TodoCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());

        return back()->withSuccess("created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
