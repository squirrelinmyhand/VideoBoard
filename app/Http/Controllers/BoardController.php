<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Request 사용
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Board; // Board 모델 사용

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
        // 리스팅 뷰 페이지 리턴
        return view('list');
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            $board = new Board();
            DB::beginTransaction();            
            $board->title = $request->title;
            $board->content = $request->content;
            DB::commit();

            // 게시글 저장 후 리스트 페이지로 리다이렉션
            return redirect(route('detail', ['id' => $board->tid]))->withSuccess('등록되었습니다');
        } catch (\PDOException $e) {
            Board::rollBack();
        }

        return redirect(route('detail'))
            ->withInput($request->all())
            ->withErrors('등록에 실패했습니다.');
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