<div class="row" style="padding-top: 10px; background-color: #367cec; color: white">
    <div class="col-xs-6 text-center">
        <img src="{{ $wechat_headimgurl }}" style="border-radius: 200px; width: 80px; height: 80px;" alt="微信头像">
    </div>
    <div class="col-xs-6">
        <div class="product-description">{{ $wechat_nickname }}</div>
        <div class="product-description" style="padding-top: 10px;">
            可提现 <br>
            <p style="font-size: 25px;font-weight: 500;">¥ {{ $can_get_price }}</p>
        </div>
    </div>
</div>

<div class="row" style="padding-top: 0px;  background-color: #184fa2; color: white;">
    <div class="col-xs-6">
    </div>
    <div class="col-xs-6">
        总收入:<span style="font-size: 20px;font-weight: 500;">¥{{ $total_price }}</span>
    </div>
</div>
