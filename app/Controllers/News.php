<?php

namespace App\Controllers;

use App\Models\POSModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(POSModel::class);

        $data = [
            'products'  => $model->loadPOS(),
            'title' => 'LunarPOS',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($category = null)
    {
        $model = model(POSModel::class);

        $data['products'] = $model->loadPOS($category);

        if (empty($data['products'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the product category: ' . $category);
        }

        $data['description'] = $data['products']['description'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = model(NewsModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required',
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'body'  => $this->request->getPost('body'),
            ]);

            echo view('news/success');
        } else {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }
}