<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BBS\test\yudai\work\Login\Login;
use BBS\test\yudai\work\Post\Post;
use BBS\test\yudai\work\Frontpage\Frontpage;
use BBS\test\yudai\work\Delete\Delete;

class BBSController extends Controller
{
    public function login_page_controller()
    {
        $frontpage = new Frontpage();
        $frontpage->login_page();
    }

    public function login_controller()
    {
        $login = new Login();
        $login->login();
    }

    public function input_controller()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->input_page();
    }

    public function list_get_controller()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->list_page();
    }

    public function list_post_controller()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->list_page();
    }

    public function login_failed_controller()
    {
        $frontpage = new Frontpage();
        $frontpage->login_failed_page();
    }

    public function logout_controller()
    {
        $frontpage = new Frontpage();
        $frontpage->logout_page();
    }

    public function save_controller()
    {
        $post = new Post();
        $login = new Login();
        $login->login_check();
        $post->save_page();
    }

    public function delete_controller()
    {
        $delete = new Delete();
        $login = new Login();
        $login->login_check();
        $delete->delete_file();
    }

    public function contents_controller()
    {
        $post = new Post();
        $login = new Login();
        $login->login_check();
        $post->contents_page();
    }
}
