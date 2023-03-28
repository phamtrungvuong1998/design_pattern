<?php

namespace App\pipeline;

class CheckLoggedInHandler implements PipelineInterface
{
    // Đối tượng xử lý kiểm tra trạng thái đăng nhập
    public function handle($input) {
        if (isset($_SESSION['user'])) {
            return ['activated' => 1, 'msg' => 'login success'];
        } else {
            return ['msg' => 'login fail'];
        }
    }
}
