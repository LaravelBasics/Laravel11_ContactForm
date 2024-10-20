<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 認証を無効にする場合は true
    }

    public function rules()
    {
        return [
            'company' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'company_url' => 'nullable|url',
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'inquiry' => 'required|array',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'company.required' => '会社名・団体名は必須項目です。',
            'department.string' => '部署名は文字列で入力してください。',
            'name.required' => '氏名は必須項目です。',
            'company_url.url' => '有効なURLを入力してください。',
            'postal_code.required' => '郵便番号は必須項目です。',
            'address.required' => '所在地は必須項目です。',
            'phone.required' => '電話番号は必須項目です。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'inquiry.required' => 'お問い合わせ内容は必須項目です。',
            'message.required' => 'お問い合わせの詳細内容は必須項目です。',
        ];
    }
}
