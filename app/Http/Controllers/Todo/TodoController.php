<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = $request->get("query", false);
        // $sort = $request->get("sort", "up");
        // // dd($query);
        // if ($query) {
        //     // $todos = Todo::where("title", "like", "%$query%");
        //     $todos = Todo::where("id", "like", "%$query%");
        //     $todos->orWhere("title", "like", "%$query%");
        // } else {
        //     $todos = Todo::query();
        // }
        // // dd($todos);

        // if ($sort == "upId")
        //     $todos->orderBy("id", "asc");
        // else if ($sort == "downId")
        //     $todos->orderBy("id", "desc");
        // else if ($sort == "upTitle")
        //     $todos->orderBy("title", "asc");
        // else if ($sort == "downTitle")
        //     $todos->orderBy("title", "desc");

        // // dd($todos->toSql());
        // $todos = $todos->get();

        // $todo = $todos->first();
        // $todos = Todo::with(["category"])->get();
        $todos = Todo::find(1);

        // if(true){
            $todos->load("category");
        // }

        // dd(Category::with("todos")->first());
        // $categories = Category::all();
        dd($todos);

        // return view("todos")->with(["todos" => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
