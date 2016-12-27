<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use League\Csv\Reader;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();

        return response()->json([
        'items' => $items,
      ]);
    }

    public function search($searchKey, $code) {
      if($searchKey == 'all') {
        $items = Item::where('code', 'like', '%' . $code . '%')
          ->orWhere('code', 'like', '%' . $code . '%')
          ->orWhere('description', 'like', '%' . $code . '%')
          ->orWhere('colour', 'like', '%' . $code . '%')
          ->orWhere('make', 'like', '%' . $code . '%')
          ->orWhere('group', 'like', '%' . $code . '%')->get();
      } else {
        $items = Item::where($searchKey, 'like', '%' . $code . '%')->get();
      }
      return response()->json([
        'items' => $items,
      ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'quantity' => 'numeric',
      ]);

        $item = Item::create($request->all());

        return response()->json([
        'message' => 'item created successfully',
        'item' => $item,
      ]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $item->update($request->all());

        return response()->json([
        'message' => 'item updated successfully',
      ]);
    }

    public function destroy($id)
    {
        Item::find($id)->delete();

        return response()->json([
        'message' => 'item deleted successfully',
      ]);
    }

    public function messages()
    {
      return [
          'quantity.numeric' => 'Quantity must be a number',
      ];
    }
}
