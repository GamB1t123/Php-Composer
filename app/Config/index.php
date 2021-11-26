<?php
   return  array(
       'App\Controller\Admin\index@admin' => 'news/admin', // actionIndex in NewsController
    'App\Controller\Home\index@home'  => 'home', // actionList in ProductController
       'App\Controller\Admin\User@index' => 'user',
       'App\Controller\Admin\Post@index' => 'post',
       'App\Controller\Admin\Post@create' => 'post/create',
       'App\Controller\Admin\Post@update' => 'post/update',
       'App\Controller\Admin\Post@delete' => 'post/delete',
       'App\Controller\Home\Contacts@index' => 'contacts',


    );
