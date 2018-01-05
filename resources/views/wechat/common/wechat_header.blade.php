<div class="row" style="padding-top: 0px;">
    <div class="col-xs-3">
        <img src="{{ $wechat_headimgurl }}" alt="微信头像">
    </div>
    <div class="col-xs-9">
        <div class="product-description">昵称：{{ $wechat_nickname }}</div>
        <div class="product-description" style="padding-top: 10px;">
            总收入：{{ $total_price }}
            &nbsp;&nbsp;&nbsp;&nbsp;
            可提现：{{ $can_get_price }}
        </div>
    </div>
</div>
