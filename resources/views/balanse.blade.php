@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <x-postads />

        <div class="post__content">

            <div class="post__content-main">
                <h2>Мой баланс</h2>
                <div style="display:block;text-align: center;padding:7px;">
                    Минимальная сумма для вывода средств - 1 руб. Выплаты производятся в автоматическом режиме на кошелек Payeer.
                </div>
                <div class="user__balans">Баланс: {{ auth()->user()->balanse }} руб.</div>
                <div style=" padding: 5px; font-weight: bold;text-align: center;margin-bottom: 10px;">
                    @if(isset(auth()->user()->payeer))
                        Payeer кошелек: {{ auth()->user()->payeer }}

                    </div>
                    <div style="text-align: center; width:100%">
                        <input style="padding: 7px;margin: 10px;" id="withdraw" data-token="{{ csrf_token() }}" type="button" name="" value="Вывод средств">
                    </div>
                    @else
                        Ваш адрес Payeer недействителен, введите его в своем профиле</div>
                    @endif 

                    
                <h2>История выплат</h2>
                <div id="display_update_history_profit">
                    <table>
                        <thead>
                            <th>Payeer</th>
                            <th>Summ</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            <tr>
                                <td>{{ $payment->payeer_adress }}</td>
                                <td>{{ $payment->summ }} руб</td>
                                <td>{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</td>
                            </tr>
                            @empty
                            <tr><td></td><td>NO payment history</td><td></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <div class="main__chap">
        @auth
        <x-authlogin />
        @endauth

        @guest
        <x-nologin />
        @endguest

        <x-statistika son="20"></x-statistika>

        <?php $list = ['Received', 'In Process', 'Repaired', 'Completed', 'Shipped', 'Waiting on Boards', 'In Route'];?>
        <x-textreklama :rek="$list" />
        <x-banerreklama />
    </div>

</div>



@include('footer.footer')
