<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Load Homepage
    public function index(){    
      //Set Data
      $data = [
        'title' => 'Welcome To '.SITENAME,
        'description' => 'save, transact.... </br> all at your fingertips'
      ];

      // Load homepage/index view
      $this->view('pages/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/about', $data);
    }

    public function load_404(){
      // Load 404 view
      $this->view('pages/404');
    }
  }