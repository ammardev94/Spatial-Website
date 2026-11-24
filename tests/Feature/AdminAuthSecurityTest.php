<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProjectFormRequest;
use Tests\TestCase;

class AdminAuthSecurityTest extends TestCase
{
    public function test_admin_login_is_rate_limited(): void
    {
        $payload = ['email' => 'nobody@example.com', 'password' => 'wrong-password'];

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('admin.login.attempt'), $payload)->assertStatus(302);
        }

        $this->post(route('admin.login.attempt'), $payload)->assertStatus(429);
    }

    public function test_svg_uploads_are_rejected(): void
    {
        $rules = ['feature_img' => (new ProjectFormRequest())->rules()['feature_img']];
        $svg = UploadedFile::fake()->createWithContent('x.svg', '<svg xmlns="http://www.w3.org/2000/svg"><script>alert(1)</script></svg>');

        $this->assertTrue(Validator::make(['feature_img' => $svg], $rules)->fails());
    }
}
