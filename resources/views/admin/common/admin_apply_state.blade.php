<div class="row">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('admin/apply?pay_state=1') }}">
                <button type="button" class="btn btn-flat @if ($current_pay_state == 1) btn-primary @else btn-default @endif">
                    提现申请
                </button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('admin/apply') }}">
                <button type="button" class="btn btn-flat @if (is_null($current_pay_state)) btn-primary @else btn-default @endif">
                    提现记录
                </button>
            </a>
        </div>
    </div>
</div>

<div style="padding-top: 20px;"></div>
