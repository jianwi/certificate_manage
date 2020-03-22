<?php


namespace App\Admin\Exceptions\Show;


use Encore\Admin\Show\AbstractField;

class CertificatePreview extends AbstractField
{
    public function render($slug = '')
    {
        // TODO: Implement render() method.
        return "<iframe src='http://jianwi.cn'></iframe>";
    }
}
