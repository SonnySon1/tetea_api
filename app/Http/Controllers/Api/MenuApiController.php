<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormater;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MenuApiController extends Controller
{
    // get data
    public function getdatamenu() {
        $data_menus = Menu::all();

        if ($data_menus) {
            return ResponseFormater::success($data_menus, 'Get data menu success', 200);
        } else {
            return ResponseFormater::error('Get data menu failed', 500);
        }
    }

    // store data
    public function store(Request $request) {
        try {
            $request->validate([
                'name'        => 'required',
                'price'       => 'required',
                'description' => 'required'
            ]);

            $data = [
                'name'        => $request->name,
                'price'       => $request->price,
                'description' => $request->description,
                'user_id'     => $request->user_id
            ];

            $data_menu = Menu::create($data);

            if ($data_menu != null) {
                return ResponseFormater::success($data_menu, 'Store data menu success', 200);
            } 
            else{
                return ResponseFormater::error('Store data menu failed', 500);
            }
        
        } catch (ValidationException $e) {
            return ResponseFormater::error('Validasi gagal', 422, $e->errors());
        }
    }

    // edit data
    public function edit($id) {
        $data_menu = Menu::where('id', $id)->first();

        if ($data_menu) {
            return ResponseFormater::success($data_menu, 'Get data menu success', 200);
        } else {
            return ResponseFormater::error('Get data menu failed', 500);
        }
    }

    // update data
    public function update(Request $request, $id) {
         try {
            $request->validate([
                'name'        => 'required',
                'price'       => 'required',
                'description' => 'required'
            ]);

            $data = [
                'name'        => $request->name,
                'price'       => $request->price,
                'description' => $request->description,
                'user_id'     => $request->user_id
            ];

            $data_menu = Menu::where('id', $id);
            $data_menu->update($data);

            if ($data_menu) {
                return ResponseFormater::success($data_menu, 'Update data menu success', 200);
            } else {
                return ResponseFormater::error('Update data menu failed', 500);
            }
         } catch (ValidationException $e) {
            return ResponseFormater::error('Validasi gagal', 422, $e->errors());
         }
    }  

    // delete data
    public function destroy($id) {
        $data_menu = Menu::where('id', $id)->first();
        $data_menu->delete();

        if ($data_menu->count() > 0) {
            return ResponseFormater::success($data_menu, 'Delete data menu success', 200);
        } else {
            return ResponseFormater::error('Delete data menu failed', 500);
        }
    }
}
