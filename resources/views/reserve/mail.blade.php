        <h1>以下の内容で予約を受け付けました。</h1>
        <ul class="form_list">
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    {{ $reserves['email'] }}
                </li>
                <li class="form_item">
                    <h2>名前</h2>
                     {{ $reserves['name'] }}
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                     {{ $reserves['tel'] }}
                </li>
                <li class="form_item">
                    <h2>希望日時</h2>
                     {{ $reserves['dateTime'] }}
                </li>
                <li class="form_item">
                    <h2>予約メニュー</h2>
                     {{ $reserves['menu']}}
                </li>
        </ul>
