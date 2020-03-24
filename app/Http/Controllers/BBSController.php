<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BBS\test\yudai\work\Login\Login;
use BBS\test\yudai\work\Post\Post;
use BBS\test\yudai\work\Frontpage\Frontpage;
use BBS\test\yudai\work\Delete\Delete;
use BBS\Config\Config;

class BBSController extends Controller
{
    public function login_page()
    {
        return view('login');
        //$frontpage = new Frontpage();
        //$frontpage->login_page();
    }

    public function login()
    {
        $config = new Config();
        if (array_key_exists('id', $_POST) && array_key_exists('password', $_POST)) {
            if (($_POST['id'] == '') || ($_POST['password'] == '')) {
                return view('login_inputmiss');
                exit();
            }
        }
        if (array_key_exists('id', $_POST) && array_key_exists('password', $_POST)) {
            if (($_POST['id'] == 'user') && ($_POST['password'] == 'password1!')) {
                file_put_contents($config->get_folder_login() . $_POST['id'] . '.txt', $_SERVER['REMOTE_ADDR']);
                return view('login_success');
            } else {
                return view('login_failed');
            }
        }
        //$login = new Login();
        //$login->login();
    }

    public function input()
    {
        
        $config = new Config();
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            } else {
                return view('input');
            }
        }
        //$frontpage = new Frontpage();
        //$login = new Login();
        //$login->login_check();
        //$frontpage->input_page();
    }

    public function list_get()
    {
        $config = new Config();
        $list = glob($config->get_folder() . '*.txt');
        $newlist = array();
        if (array_key_exists('search_file', $_POST)) {
            if ($_POST['search_file'] != '') {
                foreach ($list as $value) {
                    if (strpos($value, $_POST['search_file']) !== false) {
                        array_push($newlist, $value);
                        $list = $newlist;
                    }
                }
            }
        }
        $cnt = count($list);
        if (!(array_key_exists('page', $_GET))) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $limit = 10;
        $maxpage = $cnt / $limit;
        $maxpage = floor($maxpage);
        
        if (($cnt % $limit) != 0) {
            $maxpage += 1;
        }
        $start = $limit * ($page - 1);
        
        for ($index = 0; $index < $limit; $index++) {
            if (($start + $index + 1) <= $cnt) {
                $name = $list[$start + $index];
            }
        }
        $link = 0;
        for ($link = 0; $link < $maxpage; $link++) {
            $page_num = $link + 1;
        }
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            } else {
                return view('list', [
            'list' => $list,
            'newlist' => $newlist,
            'cnt' => $cnt,
            'limit' => $limit,
            'maxpage' => $maxpage,
            'start' => $start,
            'page' => $page,
            'name' => $name,
            'link' => $link,
            'page_num' => $page_num
        ]);
            }
        }
        
        //$frontpage = new Frontpage();
        //$login = new Login();
        //$login->login_check();
        //$frontpage->list_page();
    }

    public function list_post()
    {
        $config = new Config();
        $list = glob($config->get_folder() . '*.txt');
        $newlist = array();
        if (array_key_exists('search_file', $_POST)) {
            if ($_POST['search_file'] != '') {
                foreach ($list as $value) {
                    if (strpos($value, $_POST['search_file']) !== false) {
                        array_push($newlist, $value);
                        $list = $newlist;
                    }
                }
            }
        }
        $cnt = count($list);
        if (!(array_key_exists('page', $_GET))) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $limit = 10;
        $maxpage = $cnt / $limit;
        $maxpage = floor($maxpage);
        
        if (($cnt % $limit) != 0) {
            $maxpage += 1;
        }
        $start = $limit * ($page - 1);
        
        for ($index = 0; $index < $limit; $index++) {
            if (($start + $index + 1) <= $cnt) {
                $name = $list[$start + $index];
            }
        }
        $link = 0;
        for ($link = 0; $link < $maxpage; $link++) {
            $page_num = $link + 1;
        }
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            } else {
                return view('list', [
            'list' => $list,
            'newlist' => $newlist,
            'cnt' => $cnt,
            'limit' => $limit,
            'maxpage' => $maxpage,
            'start' => $start,
            'page' => $page,
            'name' => $name,
            'link' => $link,
            'page_num' => $page_num
        ]);
            }
        }
        //$frontpage = new Frontpage();
        //$login = new Login();
        //$login->login_check();
        //$frontpage->list_page();
    }

    public function login_failed()
    {
        $frontpage = new Frontpage();
        $frontpage->login_failed_page();
    }

    public function logout()
    {
        $config = new Config();
        unlink($config->get_folder_login() . 'user.txt');
        return view('logout');
        //$frontpage = new Frontpage();
        //$frontpage->logout_page();
    }

    public function save()
    {
        $config = new Config();
        $frontpage = new Frontpage;
        if (!($_POST['text'] == '')) {
            file_put_contents($config->get_folder() . date("YmdHis") . '.txt', $_POST['nickname'] .'|'.$_POST['title'] .'|'.$_POST['text']);
        }
        return view('save');
        
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            } else{
                return view('save');
            }
        }
        //$post = new Post();
        //$login = new Login();
        //$login->login_check();
        //$post->save_page();
    }

    public function delete()
    {
        $config = new Config();
        if (!array_key_exists('filename', $_POST)) {
            return view('delete_error');
            exit;
        }elseif($_POST['filename'] == '') {
            return view('delete_error');
            exit;
        }else{
            foreach ($_POST['filename'] as $value) {
                unlink($config->get_folder() . $value);
                return view('delete_success');
                exit;
            }
        }
        
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            }
        }
        //$delete = new Delete();
        //$login = new Login();
        //$login->login_check();
        //$delete->delete_file();
    }

    public function contents()
    {
        $config = new Config();
        if (array_key_exists('text', $_GET)) {
            $filecontents = htmlspecialchars(file_get_contents($config->get_folder().$_GET['text']));
            $filecontent = explode( '|', $filecontents);
            
        }
        
        
        if (($_SERVER['REQUEST_URI'] != '/login_page') && ($_SERVER['REQUEST_URI'] != '/login') && ($_SERVER['REQUEST_URI'] != '/login_failed')) {
            if (!file_exists($config->get_folder_login() . 'user.txt')) {
                return view('login');
                exit;
            } elseif (!file_get_contents($config->get_folder_login() . 'user.txt') == $_SERVER['REMOTE_ADDR']) {
                return view('login');
                exit;
            } else{
                return view('contents', [
                    'filecontents' => $filecontents,
                    'filecontent' => $filecontent,
                    
                ]);
            }
        }
        //$post = new Post();
        //$login = new Login();
        //$login->login_check();
        //$post->contents_page();
    }
}