<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $viewData = [];
    protected $pagetitle = '';

    public function viewData()
    {
        $data = [
            'pagetitle'    => $this->pagetitle,
            'submitButton' => 'Kaydet'
        ];

        return array_merge($data, $this->viewData);
    }
}
