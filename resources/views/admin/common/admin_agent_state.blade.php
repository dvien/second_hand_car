<div class="row">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('admin/agent') }}">
                <button type="button" class="btn btn-flat @if ($current_code != $apply_code) btn-primary @else btn-default @endif">列表</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('admin/agent') }}?wechat_user_type={{ $apply_code  }}">
                <button type="button" class="btn btn-flat @if ($current_code == $apply_code) btn-primary @else btn-default @endif">审核</button>
            </a>
        </div>
    </div>
</div>

<div style="padding-top: 20px;"></div>
