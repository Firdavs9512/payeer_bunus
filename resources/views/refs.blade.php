@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <x-postads />

        <div class="post__content">

            <div class="post__content-main">
                <h2>Список ваших рефералов</h2>
                <div style="display:block;text-align: center;padding:7px;">
                    
                    С рефералами ваш заработок увеличится в разы! Приглашайте рефералов и получайте дополнительный доход в размере до 30% от полученых рефералами бонусов. За каждого приглашенного друга вы получите 0,01 рубля.
                    В таблице ниже находится список ваших рефералов 
                </div>
                <div style="background-color: #cccccc; padding: 5px; font-weight: bold;text-align: center;margin-bottom: 10px;">Ваша реферальная ссылка: 
                  <a style="color: #A52A2A;">{{ $_SERVER['APP_URL'] }}/reg?ref={{ auth()->user()->id }}</a>  
                </div>

                <table>
                    <thead>
                        <th>Name</th>
                        <th>Date</th>
                    </thead>
                    <tbody>

                        @forelse ($refers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ date_format($user->created_at,"d F Y H:i") }}</td>
                        </tr>
                        @empty
                        <td>No referals</td>
                        @endforelse
                    </tbody>
                    
                </table>
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
