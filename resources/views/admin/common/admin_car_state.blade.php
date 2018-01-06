<div class="row">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        @foreach($cars_count AS $car_count)
        <div class="btn-group" role="group">
            <a href="{{ url('admin/car') }}?car_state={{ $car_count['code']}}">
                <button type="button" class="btn btn-flat @if (isset($current_car_state) && $car_count['code'] == $current_car_state) btn-primary @else btn-default @endif" >
                    {{ $car_count['count'] }} {{  $car_count['name'] }}
                </button>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div style="padding-top: 20px;"></div>
