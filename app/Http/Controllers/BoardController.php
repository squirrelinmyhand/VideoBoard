<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Request 사용
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Board; // Board 모델 사용
use App\Models\Attachment; // attachments 모델 사용

class BoardController extends Controller // 기본적인 컨트롤러 클래스
{
    public function index() // 두 번째 세그먼트가 전달되지 않았을 때 처리해주는 함수
    {
        // 두 번째 세크먼트가 없으면 리스트 페이지 리턴
        return this->list();
    }

    // 게시글 리스팅
    public function list()
    {
        $posts = Board::where('del_time', null)
                        ->orderBy('reg_time', 'desc')
                        ->Paginate(10, ['*'], 'page');
        $post_cnt = $posts->count();

        $total = $posts->total();
        // 리스팅 뷰 페이지 리턴
        return view('list', compact('posts', 'post_cnt'));
    }

    public function detail($bid) {
        $detail = Board::where('bid', $bid)
                        ->where('del_time', null)
                        ->first();
        // 상세 게시글 페이지 리턴
        return view('detail', compact('detail'));
    }

    // 게시글 작성 페이지
    public function write()
    {
        // 게시글 생성 페이지 리턴
        return view('write');
    }

    // 게시글 저장
    public function store(Request $request)
    {
        // dd($request);exit;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'attach' => 'mimes:csv,txt,xlx,xls,pdf,jpg,png',
        ]);

        //dd($request);exit;

        try {
            $BoardModel = new Board();
            DB::beginTransaction();
            $BoardModel->title = $request->title;
            $BoardModel->content = $request->content;
            $BoardModel->save();

            if(isset($request->attach)) {
                $file = $request->attach;
                $OrgName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileExt = $file->extension();
                $fileSize = $file->getSize();
                $md5Name = md5($file->getClientOriginalName() . $BoardModel->id . $fileSize);

                $isMove = false;
                $try = 0;
                while(true) {
                    try {
                        $request->attach->move(public_path('storage/folderA/'), $md5Name);
                        $isMove = true;
                        break;
                    } catch (Exception $e) {
                        if($try < 3) {
                            $try++;
                        } else {
                            break;
                        }
                    }
                }
                
                if($isMove) {
                    $AttachModel = new Attachment();
                    $AttachModel->bid = $BoardModel->id;
                    $AttachModel->md5Name = $md5Name;
                    $AttachModel->fileName = $OrgName;
                    $AttachModel->fileExt = $fileExt;
                    $AttachModel->fileSize = $fileSize;
                    $AttachModel->save();
                }
            }
            
            DB::commit();
            
            // 게시글 저장 후 리스트 페이지로 리다이렉션
            if($BoardModel){
                return response()->json([
                    "action" => "insert",
                    "bid" => $BoardModel->id,
                ], 200);
                // return response()->json(array('msg'=> $board), 200);
            }
            // return redirect(route('detail', ['bid' => $board->id]))->withSuccess('등록되었습니다');
        } catch (\PDOException $e) {
            echo $e;
            Board::rollBack();
        }

        return redirect(route('detail'))
            ->withInput($request->all())
            ->withErrors('등록에 실패했습니다.');
    }

    // 게시글 수정 페이지
    public function rewrite($bid)
    {
        $post = Board::where('bid', $bid)
                        ->where('del_time', null)
                        ->first();

        if($post != null) {
            // 게시글 생성 페이지에 데이터를 전달
            return view('write', compact('post'));
        } else {
            return redirect(route('detail', ['bid' => $bid]));
        }
    }


    // 게시글 수정 페이지
    public function update(Request $request)
    {
        $request->validate([
            'bid' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $UpdateTarget = [
            'title' => $request->title,
            'content' => $request->content,
            'edit_time' => DB::raw('NOW()'),
        ];
        
        try {
            DB::beginTransaction();
            Board::where('bid', $request->bid)->update($UpdateTarget);
            DB::commit();            
        } catch (\PDOException $e) {
            DB::rollBack();
        } finally {
            return redirect(route('detail', ['bid' => $request->bid]))->withSuccess('수정되었습니다')->withErrors('수정 실패되었습니다');
        }
    }

    public function delete($bid) {
        try {
            DB::beginTransaction();
            Board::where('bid', $bid)->update(["del_time" => DB::raw('NOW()')]);
            DB::commit();

            return redirect(route('list'))->withSuccess('삭제되었습니다');
        } catch (\PDOException $e) {
            echo $e;
            exit;
            //DB::rollBack();
        }

        return redirect(route('detail', ['bid' => $bid]))->withErrors('삭제 실패되었습니다');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
    return redirect()->to('/the_redirect_location')
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors([
            $this->username() => Lang::get('auth.failed'),
        ]);
    }
}

?>