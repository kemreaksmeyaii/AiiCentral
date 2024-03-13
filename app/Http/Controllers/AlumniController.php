<?php

namespace App\Http\Controllers;

use App\Helper\RBAC;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AlumniController extends Controller
{

    protected function dataList()
    {
        return Alumni::where('state', 1)->with('category')->get();
    }

    public function view()
    {
        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        return View('AdminMenu.Alumni.index');
    }

    public function index()
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }
            return response()->json(
                [
                    'status' => 'success',
                    'icon' => 'success',
                    'data' => $this->dataList(),
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Get Data Menu Index Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }

    public function store(Request $request)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            $validation = Validator($request->all(), [
                'name_kh' => 'required',
                // 'title_en' => 'required',
            ]);
            if ($validation->fails()) {
                return response()->json(
                    [
                        'status' => 'error',
                        'icon' => 'error',
                        'result' => $validation->getMessageBag()
                    ]
                );
            }
            $data = $request->all();
            $data['slug'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->name_en));
            Alumni::create($data);

            return response()->json(
                [
                    'status' => 'success',
                    'icon' => 'success',
                    'data' => $this->dataList(),
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Get Data Menu Index Error!',
                    'result' => $th->getMessage(),
                    'data' => [],
                ]
            );
        }
    }

    public function show(Event $event)
    {
        //
    }

    public function update(Request $request, Alumni $alumni)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            $validation = Validator($request->all(), [
                'name_kh' => 'required',
                // 'title_en' => 'required',
            ]);
            if ($validation->fails()) {
                return response()->json(
                    [
                        'status' => 'error',
                        'icon' => 'error',
                        'result' => $validation->getMessageBag()
                    ]
                );
            }
            $data = $request->all();
            $data['slug'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->name_en));
            $alumni->update($data);

            return response()->json(
                [
                    'status' => 'success',
                    'icon' => 'success',
                    'data' => $this->dataList(),
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Get Data Menu Index Error!',
                    'result' => $th->getMessage(),
                    'data' => [],
                ]
            );
        }
    }

    public function destroy(Alumni $alumni)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }
            $alumni['state'] = 0;
            $event->update();

            return response()->json(
                [
                    'status' => 'success',
                    'icon' => 'success',
                    'data' => $this->dataList(),
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Delete Data Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }
}
