<?php 
namespace Home\Controller;

class MainController extends CommonController
{
	public function main(){
		$this -> display();
	}

	public function articleData(){
		$type = I('post.type');
		$type = $type>=0?$type:-1;
		$article = D('media_article');
		$draftbox = D('portal_article_draftbox');
		$uid = $_SESSION['userdata']['buid'];
		$where['uid'] = ['eq',$uid];
		if($type >= 0 ){
			$where['status'] = ['eq',$type];
		}
		if($type == 4 || $type == -1){
			$res = $draftbox -> where("uid = $uid") -> select();
			if($type == -1){
				$res1 = $article -> where($where) -> select();
				foreach ($res1 as $key => $val) {
					$res[] = $val;
				}
			}
		}else{
			$res = $article -> where($where) -> select();
		}
		// $totalRow = $this -> where($map) -> count();

  //       // 每页显示条数
  //       $num = 50;

  //       // 实例化分页类
  //       $page = new \Think\Page($totalRow , $num);
		$status = ['已发布','待审核','未通过','未发布'];
		foreach ($res as $k => $v) {
			$data['id'] = $v['id']?$v['id']:$v['aid']; 
			$data['title'] = $v['title']; 
			$data['pic'] = 'http://www.lxzntech.com/data/attachment/'.$v['pic']; 
			$data['type'] = $v['id']?'draft':'article';
			$sta = $v['status'] != null?$v['status']:3;
			$data['status'] = $v['status'];
			$data['statusname'] = $status[$sta];
			$data['viewnum'] = $v['viewnum']?$v['viewnum']:0;//阅读数
			$data['commentnum'] = $v['commentnum']?$v['commentnum']:0;//评论数
			$data['favtimes'] = $v['favtimes']?$v['favtimes']:0;//收藏数
			$data['sharetimes'] = $v['sharetimes']?$v['sharetimes']:0;//分享数
			$data['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
			$result[] = $data;
		}
		if($result){
			$return['status'] = 1;
			$return['data'] = $result;
			$return['msg'] = '查询成功';
		}else{
			$return['status'] = 0;
			$return['data'] = [];
			$return['msg'] = '没有数据';
		}
		$this -> ajaxReturn($return);
	}

	// 发布文章
	public function addActicle(){
		$member = D('common_member');
		$articleTitle = D('portal_article_title');
		$articleContent = D('portal_article_content');
		$articleCount = D('portal_article_count');
		$category = D('portal_category');
		$title = I('post.title');
		$content = I('post.content');
		$catid = I('post.catid');
		$summary = I('post.summary');
		$uid = $_SESSION['userdata']['buid'];
		$minfo = $member -> where("uid = $uid") -> find();
		$tres = checkWords($title);
		$data['status'] = 0;
		if($tres['status'] == 1){
			$title = $tres['content'];
		}elseif($tres['status'] == 2){
			$data['status'] = 1;
		}elseif ($tres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}
		$conres = checkWords($content);
		if($conres['status'] == 1){
			$content = $conres['content'];
		}elseif($conres['status'] == 2){
			$data['status'] = 1;
		}elseif ($conres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}
		$sumres = checkWords($summary);
		if($sumres['status'] == 1){
			$summary = $sumres['content'];
		}elseif($sumres['status'] == 2){
			$data['status'] = 1;
		}elseif ($sumres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}

		$data['catid'] = $catid;
		$data['uid'] = $uid;
		$data['username'] = $minfo['username'];
		$data['title'] = $title;
		$data['highlight'] = "|||";
		$data['summary'] = $summary;
		$data['contents'] = 1;
		$data['allowcomment'] = 1;
		$data['dateline'] = time();
		$aid = $articleTitle -> add($data);
		if($aid){
			$data['aid'] = $aid;
			$data['content'] = $content;
			$data['pageorder'] = 1;
			$articleContent -> add($data);
			$articleCount -> add($data);
			if($data['status'] == 0){
				$category -> where("aid = $aid") -> setInc('articles');
			}
			$return['status'] = 1;
			$return['data'] = '';
			$return['msg'] = '提交成功';
		}else{
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '提交失败';
		}
		$this -> ajaxReturn($return);

	}

	//保存草稿箱
	public function saveDraft(){
		$draft = D('portal_article_draftbox');
		$member = D('common_member');
		$title = I('post.title');
		$content = I('post.content');
		$catid = I('post.catid');
		$summary = I('post.summary');
		$uid = $_SESSION['userdata']['buid'];
		$data['catid'] = $catid;
		$data['uid'] = $uid;
		$data['title'] = $title;
		$data['content'] = $content;
		$data['summary'] = $summary;
		$data['dateline'] = time();
		$res = $draft -> add($data);
		if($res){
			$return['status'] = 1;
			$return['data'] = '';
			$return['msg'] = '提交成功';
		}else{
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '提交失败';
		}
		$this -> ajaxReturn($return);
	}

	// 编辑
	public function edit(){
		$id = I('id');
		$type = I('type');
		$draft = D('portal_article_draftbox');
		$article = D('media_article');
		$category = D('portal_category');
		if($id){
			if($type == 'draft'){
				$res = $draft -> where("id = $id") -> find();
			}else{
				$res = $article -> where("aid = $id") -> find();
			}
			$this -> assign('data',$res);
		}
		$catname = $category -> field('catid,catname') -> where('catid >= 38') -> select();
		$this -> assign('catname',$catname);
		$this -> display();
	}

	// 保存编辑
	public function doEdit(){
		$member = D('common_member');
		$articleTitle = D('portal_article_title');
		$articleContent = D('portal_article_content');
		$articleCount = D('portal_article_count');
		$category = D('portal_category');
		$aid = I('post.aid');
		$title = I('post.title');
		$content = I('content');
		$catid = I('post.catid');
		$summary = I('post.summary');
		$uid = $_SESSION['userdata']['buid'];
		$content = htmlspecialchars_decode($content);
		$minfo = $member -> where("uid = $uid") -> find();
		$tres = checkWords($title);
		$data['status'] = 0;
		if($tres['status'] == 1){
			$title = $tres['content'];
		}elseif($tres['status'] == 2){
			$data['status'] = 1;
		}elseif ($tres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}
		$conres = checkWords($content);
		if($conres['status'] == 1){
			$content = $conres['content'];
		}elseif($conres['status'] == 2){
			$data['status'] = 1;
		}elseif ($conres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}
		$sumres = checkWords($summary);
		if($sumres['status'] == 1){
			$summary = $sumres['content'];
		}elseif($sumres['status'] == 2){
			$data['status'] = 1;
		}elseif ($sumres['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}

		preg_match_all('/<img src="(.*?)" (.*?)>/', $content, $images);
		foreach ($images[1] as $ki => $vi) {
		    $date = date('Ym',time());
		    $day = date('d',time());
		    // $rep = addslashes($vi);
		    $match = "/data:image\/(.*?);base64,/";
	    	preg_match($match,$vi,$type);
	    	$imgName = md5(time().mt_rand(1,100000)).'.'.$type[1];
		    $url = "data/attachment/portal/{$date}/{$day}/";
		    $rootPath = "../bbs/";
		    $path = $rootPath.$url;
		    if(!file_exists($path) || !is_dir($path)){
	            mkdir($path,0777,true); 
	        }
	        // 把"data:image/JPEG;base64,"去除
	        $replace = "/data:image\/(.*?);base64,/";
	        $base = preg_replace($replace,'',$vi);
		    $file=str_replace(' ', '+', $base);
		    $img=base64_decode($file);
		    file_put_contents($path.$imgName, $img);

			$m = substr($vi, 0,60);
			$m = preg_quote($m);
			$m = preg_replace('/\//','\/',$m);
			$content = preg_replace("/({$m})/",$url.$imgName.'@',$content);
		    // $content = preg_replace('/(<img src="(.*?)" alt="">)/',$url.$imgName,$content);
		    // $content = preg_replace('/(<img src="(.*?)" alt="">)/',$url.$imgName,$content);
		    // $content = preg_replace("/({$rep})/",$url.$type[1],$content);
		}
		$content = preg_replace('/@+.*? alt=""/','"',$content);
		if($aid){
			$data['catid'] = $catid;
			$data['uid'] = $uid;
			$data['username'] = $minfo['username'];
			$data['title'] = $title;
			$data['highlight'] = "|||";
			$data['summary'] = $summary;
			$data['contents'] = 1;
			$data['allowcomment'] = 1;
			$data['dateline'] = time();
			$aid = $articleTitle -> where("aid = $aid") -> save($data);
			if($aid){
				$data['content'] = $content;
				$data['pageorder'] = 1;
				$articleContent -> where("aid = $aid") -> save($data);
				$return['status'] = 1;
				$return['data'] = '';
				$return['msg'] = '提交成功';
			}else{
				$return['status'] = 0;
				$return['data'] = '';
				$return['msg'] = '提交失败';
			}
			$this -> ajaxReturn($return);
		}else{
			$data['catid'] = $catid;
			$data['uid'] = $uid;
			$data['username'] = $minfo['username'];
			$data['title'] = $title;
			$data['highlight'] = "|||";
			$data['summary'] = $summary;
			$data['contents'] = 1;
			$data['allowcomment'] = 1;
			$data['dateline'] = time();
			$aid = $articleTitle -> add($data);
			if($aid){
				$data['aid'] = $aid;
				$data['content'] = $content;
				$data['pageorder'] = 1;
				$articleContent -> add($data);
				$articleCount -> add($data);
				if($data['status'] == 0){
					$category -> where("catid = $catid") -> setInc('articles');
				}
				$return['status'] = 1;
				$return['data'] = '';
				$return['msg'] = '提交成功';
			}else{
				$return['status'] = 0;
				$return['data'] = '';
				$return['msg'] = '提交失败';
			}
			$this -> ajaxReturn($return);
		}
		
	}

	public function delArticle(){
		$draft = D('portal_article_draftbox');
		$articleTitle = D('portal_article_title');
		$articleContent = D('portal_article_content');
		$articleCount = D('portal_article_count');
		$category = D('portal_category');
		$id = I('id');
		$type = I('type');
		if($type == 'draft'){
			$res = $draft -> where("id = $id") -> delete();
		}else{
			$titleRes = $articleTitle -> where("aid = $id") -> find();
			$res = $articleTitle -> where("aid = $id") -> delete();
			if($res){
				$articleContent -> where("aid = $id") -> delete();
				$articleCount -> where("aid = $id") -> delete();
				$category -> where("catid = {$titleRes['catid']}") -> setDec('articles');
			}
		}
		if($res){
			$data['status'] = 1;
			$data['data'] = '';
			$data['msg'] = '删除成功';
		}else{
			$data['status'] = 1;
			$data['data'] = '';
			$data['msg'] = '删除失败';
		}
		$this -> ajaxReturn($data);
	}

	public function search(){
		$article = D('media_article');
		$uid = $_SESSION['userdata']['buid'];
		$word = I('word');
		$map['title'] = ['like',"%{$word}%"];
		$map['uid'] = $uid;
		$num = I('num')?I('num'):1;
		$row = ($num-1)*10;
		$total = $article -> where($map) -> count();
		$res = $article -> where($map) -> limit($row,10) -> select();
		$page = ceil($total/10);
		foreach ($res as $k => $v) {
			$res[$k]['dateline'] = date("Y-m-d H:i:s",$v['dateline']);
		}
		if($res){
			$data['status'] = 1;
			$data['data'] = $res;
			$data['page'] = $page;
		}else{
			$data['status'] = 0;
			$data['data'] = [];
			$data['page'] = 0;
		}
		// echo M()->getLastSql();
		// dump($res);
		$this -> ajaxReturn($data);
	}
}