<?php

class LoginController {
    public function index(){
        $render = new Utils();
        $render->render('login/index');
    }
}