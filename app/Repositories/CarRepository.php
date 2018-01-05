<?php

namespace App\Repositories;

use App\Models\Car;

/**
 * Class CarRepository
 * @package App\Repositories
 */
class CarRepository extends BaseRepository
{
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function store($input)
    {
        $this->car->create($input);
    }
}
