<?php
class logoutController extends Controller{
    public function index(){

                session_destroy();
                header("Location:/login");
        
            
        }
    }