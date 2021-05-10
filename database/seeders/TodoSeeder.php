<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    protected $todos = [
        ["title" => "Todo1", "category_id" => 5],
        ["title" => "Todo2", "category_id" => 4],
        ["title" => "Todo3", "category_id" => 3],
        ["title" => "Todo4", "category_id" => 2],
        ["title" => "Todo5", "category_id" => 1],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ($this->todos as $item) {
            Todo::create($item);
        }
    }
}
