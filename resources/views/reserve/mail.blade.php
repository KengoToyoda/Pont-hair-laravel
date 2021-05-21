        <h1>以下の内容で予約を受け付けました。</h1>
        <ul class="form_list">
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    {{ $reserve->email }}
                </li>
                <li class="form_item">
                    <h2>名前</h2>
                     {{ $reserve->name }}
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                     {{ $reserve->tel }}
                </li>
                <li class="form_item">
                    <h2>希望日時</h2>
                     {{ $reserve->dateTime }}
                </li>
                <li class="form_item">
                    <h2>予約メニュー</h2>
                     {{ $reserve->menu}}
                </li>
        </ul>
