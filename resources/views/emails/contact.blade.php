<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ内容</title>
</head>
<body>
    <h1>お問い合わせ内容</h1>
    <p>会社名・団体名: {{ $data['company'] }}</p>
    <p>部署名: {{ $data['department'] }}</p>
    <p>氏名: {{ $data['name'] }}</p>
    <p>会社URL: {{ $data['company_url'] }}</p>
    <p>郵便番号: {{ $data['postal_code'] }}</p>
    <p>所在地: {{ $data['address'] }}</p>
    <p>電話番号: {{ $data['phone'] }}</p>
    <p>メールアドレス: {{ $data['email'] }}</p>
    <p>お問い合わせ内容: {{ implode(', ', $data['inquiry']) }}</p> <!-- 配列をカンマ区切りで表示 -->
    <p>お問い合わせの詳細内容: {{ $data['message'] }}</p>
</body>
</html>
