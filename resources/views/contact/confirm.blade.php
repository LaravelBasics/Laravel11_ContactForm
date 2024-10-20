<!DOCTYPE html>
<html>
<head>
    <title>確認画面</title>
</head>
<body>
    <h1>確認画面</h1>
    <p>会社名・団体名: {{ $validated['company'] }}</p>
    <p>部署名 {{ $validated['department'] }}</p>
    <p>氏名: {{ $validated['name'] }}</p>
    <p>会社URL {{ $validated['company_url'] }}</p>
    <p>郵便番号: {{ $validated['postal_code'] }}</p>
    <p>所在地: {{ $validated['address'] }}</p>
    <p>電話番号: {{ $validated['phone'] }}</p>
    <p>メールアドレス: {{ $validated['email'] }}</p>
    <p>お問い合わせ内容:</p>
    <ul>
        @foreach($validated['inquiry'] as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <input type="hidden" name="company" value="{{ $validated['company'] }}">
        <input type="hidden" name="department" value="{{ $validated['department'] }}">
        <input type="hidden" name="name" value="{{ $validated['name'] }}">
        <input type="hidden" name="company_url" value="{{ $validated['company_url'] }}">
        <input type="hidden" name="postal_code" value="{{ $validated['postal_code'] }}">
        <input type="hidden" name="address" value="{{ $validated['address'] }}">
        <input type="hidden" name="phone" value="{{ $validated['phone'] }}">
        <input type="hidden" name="email" value="{{ $validated['email'] }}">
        <input type="hidden" name="message" value="{{ $validated['message'] }}">
        @foreach($validated['inquiry'] as $item)
            <input type="hidden" name="inquiry[]" value="{{ $item }}">
        @endforeach

        <button type="submit">送信</button>
    </form>
    <a href="{{ route('contact.create') }}">戻る</a>
</body>
</html>
