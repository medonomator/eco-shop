@extends('layouts.app') @section('content')

<section class="main-content">
                
    <h2>Если у вас есть идеи по улучшению данного ресурса или организации нового проекта, напишите мне.</h2>

    <div class="messenger-icons">
        <a href="https://api.whatsapp.com" target="_blank" class="messenger-icons-item"
            ><img src="./img/icons/whatsapp.png" alt="alt"
        /></a>
        <a href="https://t.me/medonomator" target="_blank" class="messenger-icons-item"
            ><img src="./img/icons/telegram.png" alt="alt"
        /></a>
        <a href="https://vk.com/medonomator" target="_blank" class="messenger-icons-item"
            ><img src="./img/icons/vk-1.svg" alt="alt"
        /></a>
    </div>

    <iframe
        src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%9F%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D1%82%D1%8C%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82&targets-hint=&default-sum=&button-text=14&payment-type-choice=on&mobile-payment-type-choice=on&hint=&successURL=http%3A%2F%2F83.166.242.213%2Fgratitude&quickpay=shop&account=410014038527087"
        width="100%"
        height="222"
        frameborder="0"
        allowtransparency="true"
        scrolling="no"
    ></iframe>

    <p class="support-phone">Или на этот номер: +79081612317</p>
</section>
@endsection
