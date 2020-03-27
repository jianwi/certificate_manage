<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('证书管理系统')
            ->description('留住每一次荣耀')
            ->row('<iframe width="100%" height="600px" src="/"></iframe>')
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {

                });

                $row->column(4, function (Column $column) {
                });

                $row->column(4, function (Column $column) {
                });
            });
    }
}
