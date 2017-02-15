<?php

namespace App\Controllers;


use App\Models\Post;
use Core\BaseController;
use Core\Redirect;
use Core\Validator;

class PostsController extends BaseController
{
    private $post;

    public function __construct()
    {
        parent::__construct();
        $this->post = new Post;
    }

    public function index()
    {
        $this->setPageTitle('Posts');
        $this->view->posts = $this->post->All();
        return $this->renderView('posts/index', 'layout');
    }

    public function show($id)
    {
        $this->view->post = $this->post->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        return $this->renderView('posts/show', 'layout');
    }

    public function create()
    {
        $this->setPageTitle('New post');
        return $this->renderView('posts/create', 'layout');
    }

    public function store($request)
    {
        $data = [
            'title' => $request->post->title,
            'content' => $request->post->content
        ];

        if (Validator::make($data, $this->post->rules())) {
            return Redirect::route("/post/create");
        }

        try{
            $this->post->create($data);
            return Redirect::route('/posts', [
                'success' => ['Post criado com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }

        /*if($this->post->create($data)){
            return Redirect::route('/posts');
        }else{
            return Redirect::route('/posts', [
                'errors' => ['Erro ao inserir no banco de dados!']
            ]);
        }*/
    }

    public function edit($id)
    {
        $this->view->post = $this->post->find($id);
        $this->setPageTitle('Edit post - ' . $this->view->post->title);
        return $this->renderView('posts/edit', 'layout');
    }

    public function update($id, $request)
    {
        $data = [
            'title' => $request->post->title,
            'content' => $request->post->content
        ];

        if(Validator::make($data, $this->post->rules())){
            return Redirect::route("/post/{$id}/edit");
        }

        try{
            $this->post->find($id)->update($data);
            return Redirect::route('/posts', [
                'success' => ['Post atualizado com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }

        /*if($this->post->update($data, $id)){
            return Redirect::route('/posts', [
                'success' => ['Post atualizado com sucesso!']
            ]);
        }else{
            return Redirect::route('/posts', [
                'errors' => ['Erro ao atualzar!']
            ]);
        }*/
    }

    public function delete($id)
    {
        try{
            $this->post->find($id)->delete();
            return Redirect::route('/posts', [
                'success' => ['Post excluído com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }

        /*if($this->post->delete($id)){
            return Redirect::route('/posts');
        }else{
            return Redirect::route('/posts', [
                'errors' => ['Erro ao excluir!']
            ]);
        }*/
    }

}