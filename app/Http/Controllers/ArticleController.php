<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Helper\RBAC;
use Illuminate\Support\Facades\Route;
use App\Models\CategoryArticle;

class ArticleController extends Controller
{
    // All articles
    protected function dataList()
    {
        return Article::where('state', 1)->with('category')->get();
    }
    // Teacher only
    protected function teacherList()
    {
        return Article::where('state', 1)->with('category')->where('parent_category_id', '=', 10)->get();
    }

    public function view()
    {

        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        return View('AdminMenu.Article.index');
    }

    public function index()
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            // $dataLidst = Type::where('status', 1)->get();
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

    public function create()
    {
        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        return View('AdminMenu.Article.form')
            ->with('Article', null)
            ->with('category', CategoryArticle::where('state', 1)->get())
            ->with('RelateArticle', $this->dataList())
            ->with('RelateTeachers', $this->teacherList());
    }

    public function store(Request $request)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }
            $validation = Validator($request->all(), [
                'title_en' => 'required',
                'title_kh' => 'required',
                // 'slug_kh' => 'required|unique:articles',
                // 'slug_en' => 'required|unique:articles',
                'feature' => 'required',
                'access' => 'required',
                'parent_category_id' => 'required',
                'article_editor_en' => 'required',
                'article_editor_kh' => 'required',
                'ordering' => 'required',
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

            $slugOld = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->title_en));
            $oldName = Article::where('slug_en',  $slugOld)->first();
            $code = random_int(100000, 999999);
            if ($oldName == null) {
                $oldID = '';
            } else {
                $oldID = '-' . $code;
            }

            $data['slug_en'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->title_en . $oldID));
            $data['slug_kh'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", $request->title_kh . $oldID);

            Article::create($data);

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
                    'msg' => 'Insert data Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }

    // show => ediit
    public function show(Article $Article)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            return View('AdminMenu.Article.form')
                ->with('Article',  $Article)
                ->with('category', CategoryArticle::where('state', 1)->get())
                ->with('RelateArticle', $this->dataList())
                ->with('RelateTeachers', $this->teacherList());

            return [
                'status' => 'success',
                'icon' => 'success',
                'data' => $Article,
                'view' => View('AdminMenu.Article.form')
            ];
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Update data Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }

    public function update(Request $request, Article $Article)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            $validation = Validator($request->all(), [
                'title_en' =>   'required',
                'title_kh' =>   'required',
                // 'slug_kh' => 'required|unique:articles,slug_kh,' . $Article->id,
                // 'slug_en' => 'required|unique:articles,slug_en,' . $Article->id,
                'feature' => 'required',
                'access' => 'required',
                'parent_category_id' => 'required',
                'article_editor_en' => 'required',
                'article_editor_kh' => 'required',
                'ordering' => 'required',
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

            // $slugOld = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->title_en));
            // $oldName = Article::where('slug_en',  $slugOld)->first();

            // $code = random_int(100000, 999999);
            // if($oldName != null && $Article->slug_en != $request->slug_en){
            //     $oldID = '-' . $code;
            //     $data['slug_en'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->title_en . $oldID));
            //     $data['slug_kh'] = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\ \  \|\\\]/", "-", strtolower($request->title_kh . $oldID));
            // }

            $data['slug_en'] = $Article->slug_en;
            $data['slug_kh'] = $Article->slug_kh;
            $Article->update($data);

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
                    'msg' => 'Update data Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }

    public function destroy(Article $Article)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }
            $Article['state'] = 0;
            $Article->update();


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

    public function viewTeachers()
    {
        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        return View('AdminMenu.Article.teachers');
    }
    public function teacherIndex()
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            $data = Article::where('state', 1)->where('parent_category_id', 10)->with('category')->get();

            // $dataLidst = Type::where('status', 1)->get();
            return response()->json(
                [
                    'status' => 'success',
                    'icon' => 'success',
                    'data' => $data,
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
    public function teacherCreate()
    {
        if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
            //return redirect to authourized
            return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
        }
        return View('AdminMenu.Article.teachersForm')
            ->with('Article', null)
            ->with('category', CategoryArticle::where('state', 1)->where('id', 10)->get())
            ->with('RelateArticle', $this->dataList())
            ->with('RelateTeachers', $this->teacherList());
    }
    // show => ediit
    public function teacherShow(Article $Article)
    {
        try {
            if (!RBAC::isAccessible(str_replace('Controller', '', class_basename(Route::current()->controller)) . '-' . Route::getCurrentRoute()->getActionMethod())) {
                //return redirect to authourized
                return ['result' => 'error', 'msg' => 'Unauthorized Action', 'data' => ''];
            }

            return View('AdminMenu.Article.teachersForm')
                ->with('Article',  $Article)
                ->with('category', CategoryArticle::where('state', 1)->where('id', 10)->get())
                ->with('RelateArticle', $this->dataList())
                ->with('RelateTeachers', $this->teacherList());

            return [
                'status' => 'success',
                'icon' => 'success',
                'data' => $Article,
                'view' => View('AdminMenu.Article.form')
            ];
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'icon' => 'error',
                    'msg' => 'Update data Error!',
                    'result' => $th,
                    'data' => [],
                ]
            );
        }
    }
}
