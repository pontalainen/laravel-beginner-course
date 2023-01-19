<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;

class TodoListController extends Controller
{
    public function index()
    {
        return view(
            'todo-list',
            ['listItems' => listItem::where('is_complete', 0)->get()],
            ['completedItems' => listItem::where('is_complete', 1)->get()]
        );
    }

    public function markComplete($id)
    {
        $listItem = listItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request)
    {

        $newListItem = new listItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('/');
    }

    public function removeItem($id)
    {

        $listItem = listItem::find($id);
        $listItem->delete();

        return redirect('/');
    }

    public function removeAll()
    {
        $completedItem = listItem::where('is_complete', 1);
        $completedItem->delete();

        return redirect('/');
    }
}
