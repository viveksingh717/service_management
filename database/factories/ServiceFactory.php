<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service_name = $this->faker->unique()->word($nb=4, $asText=true);
        $service_slug = Str::slug($service_name, '-');
        $service_image = 'service_'.$this->faker->unique()->numberBetween(1,20).'.jpg';

        return [
            'category_id'=>$this->faker->numberBetween(1,9),
            'service_name'=>$service_name,
            'service_slug'=>$service_slug,
            'tagline'=>$this->faker->text(20),
            'description'=>$this->faker->text(500),
            'price'=>$this->faker->numberBetween(100,500),
            'service_image'=>$service_image,
            'thumbnail'=>'service_'.$this->faker->unique()->numberBetween(1,20).'.png',
            'inclusion'=>$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20),
            'exclusion'=>$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20).'|'.$this->faker->text(20)
        ];
    }
}
