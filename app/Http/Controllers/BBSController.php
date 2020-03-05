<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BBS\test\yudai\work\Login\Login;
use BBS\test\yudai\work\Post\Post;
use BBS\test\yudai\work\Frontpage\Frontpage;
use BBS\test\yudai\work\Delete\Delete;

class BBSController extends Controller
{
    public function login_page()
    {
        $frontpage = new Frontpage();
        $frontpage->login_page();
    }

    public function login()
    {
        $login = new Login();
        $login->login();
    }

    public function input()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->input_page();
    }

    public function list_get()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->list_page();
    }

    public function list_post()
    {
        $frontpage = new Frontpage();
        $login = new Login();
        $login->login_check();
        $frontpage->list_page();
    }

    public function login_failed()
    {
        $frontpage = new Frontpage();
        $frontpage->login_failed_page();
    }

    public function logout()
    {
        $frontpage = new Frontpage();
        $frontpage->logout_page();
    }

    public function save()
    {
        $post = new Post();
        $login = new Login();
        $login->login_check();
        $post->save_page();
    }

    public function delete()
    {
        $delete = new Delete();
        $login = new Login();
        $login->login_check();
        $delete->delete_file();
    }

    public function contents()
    {
        $post = new Post();
        $login = new Login();
        $login->login_check();
        $post->contents_page();
    }
}
