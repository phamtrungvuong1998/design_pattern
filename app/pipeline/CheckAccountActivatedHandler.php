<?php

namespace App\pipeline;

class CheckAccountActivatedHandler implements PipelineInterface
{
    // Đối tượng xử lý kiểm tra tài khoản đã được kích hoạt hay chưa
    public function handle($input) {
        if (!empty($input['activated']) && $input['activated'] == 1) {
            return "Account activated";
        } elseif (empty($input['activated'])){
            return $input['msg'];
        } else {
            return "Account not activated";
        }
    }
}
