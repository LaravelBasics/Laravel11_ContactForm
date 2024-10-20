<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactFormRequest $request)
    {
        // バリデーション(成功)済みのデータを取得
        $validated = $request->validated();
        // 確認画面にリダイレクト
        
        return view('contact.confirm', compact('validated'));
    }

    public function send(ContactFormRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();

        // メール送信
        // このメールアドレスは管理者用の固定アドレスとして使用されています。
        // 実際のプロジェクトでは、このアドレスを動的に設定したり、.envファイルで定義することもあります
        // （例：Mail::to(env('MAIL_ADMIN'))のようにして管理者のアドレスを.envで設定可能）
        Mail::to('test@test.com')->send(new ContactFormMail($validated));//管理者宛に送信
        // ->send() メソッドは、メールの送信を実行,引数として新しいContactFormMailインスタンスを渡しています。このインスタンスはメールの内容を定義するためのもの
        // ContactFormMail クラスは、フォームで入力されたデータをもとにメールの内容を作成するクラスです。
        // このクラスのコンストラクタに$validated（バリデーション済みのデータ）を渡して、メールの内容として使用
        // ContactFormMailクラスの中で、どのテンプレートを使ってメールを作成するかが定義されています（例：resources/views/emails/contact.blade.php）
        Mail::to($validated['email'])->send(new ContactFormMail($validated));//フォームの送信者に対して確認メールを送信する処理
        // $validated['email']には、フォームに入力されたユーザーのメールアドレスが格納されています。
        // このデータは、ContactFormRequestクラスによってバリデーションされたものです。
        // つまり、管理者宛てのメールとは別に、フォーム送信者自身にも確認メールが送信されます

        return view('contact.thankyou'); // サンクスページへリダイレクト
    }
}
