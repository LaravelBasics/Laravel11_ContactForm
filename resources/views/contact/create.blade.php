<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <style>
        /* スタイルを追加（任意） */
        .alert {
            color: red;
            margin-bottom: 15px;
        }
        .required {
            color: red;
        }
    </style>
    <script>
        // JavaScriptでチェックボックスの状態を確認し、送信ボタンの有効/無効を制御
        function toggleSubmitButton() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]#consentCheckbox');
            const submitButton = document.getElementById('submitButton');
            const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            submitButton.disabled = !isChecked; // チェックされていなければボタンを無効化
        }
    </script>
</head>
<body>
    <h1>お問い合わせフォーム</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <label for="">会社・団体名 <span class="required">必須</span></label>
        <input type="text" name="company" value="{{ old('company') }}">
        <br>

        <label for="">部署名</label>
        <input type="text" name="department" value="{{ old('department') }}">
        <br>

        <label for="name">氏名 <span class="required">必須</span></label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br>

        <label for="">会社URL</label>
        <input type="text" name="company_url" value="{{ old('company_url') }}">
        <br>

        <label for="">郵便番号 <span class="required">必須</span></label>
        <input type="text" name="postal_code" value="{{ old('postal_code') }}">
        <br>

        <label for="">所在地 <span class="required">必須</span></label>
        <input type="text" name="address" value="{{ old('address') }}">
        <br>

        <label for="">電話番号 <span class="required">必須</span></label>
        <input type="text" name="phone" value="{{ old('phone') }}">
        <br>

        <label for="email">メールアドレス <span class="required">必須</span></label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <p>お問い合わせ内容 <span class="required">必須</span></p>
        @foreach ([
            'Webサイト・デザイン制作・システム開発' => 'Webサイト・デザイン制作・システム開発について',
            'オンライン英会話システム開発' => 'オンライン英会話システム開発について',
            'オンライン予約パッケージシステム' => 'オンライン予約パッケージシステムについて',
            '保守運用・コンテンツ作成代行' => '保守運用・コンテンツ作成代行について',
            '採用' => '採用について',
            '営業' => '営業',
            'その他サービス' => 'その他サービスについて'
        ] as $value => $label)
        <label>
        <input type="checkbox" name="inquiry[]" value="{{ $value }}"
               {{ in_array($value, old('inquiry', [])) ? 'checked' : '' }}> 
            {{ $label }}
        </label>
        <br>
        @endforeach
        
        <label for="message">お問い合わせの詳細内容 <span class="required">必須</span></label>
        <textarea name="message">{{ old('message') }}</textarea>
        <br>

        <label>
            <input type="checkbox" id="consentCheckbox" onchange="toggleSubmitButton()"> 
            下記の個人情報の取り扱いに同意する
        </label>
        <br>

        <button type="submit" id="submitButton" disabled>入力内容を確認する</button>
    </form>
</body>
</html>
