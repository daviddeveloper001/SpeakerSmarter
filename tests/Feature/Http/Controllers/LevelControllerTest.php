<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LevelController
 */
final class LevelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $levels = Level::factory()->count(3)->create();

        $response = $this->get(route('levels.index'));
    }


    #[Test]
    public function create_behaves_as_expected(): void
    {
        $level = Level::factory()->create();

        $response = $this->get(route('levels.create'));
    }


    #[Test]
    public function edit_behaves_as_expected(): void
    {
        $level = Level::factory()->create();

        $response = $this->get(route('levels.edit', $level));
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LevelController::class,
            'store',
            \App\Http\Requests\LevelStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();

        $response = $this->post(route('levels.store'), [
            'name' => $name,
        ]);

        $levels = Level::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $levels);
        $level = $levels->first();

        $response->assertRedirect(route('level.index'));
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $level = Level::factory()->create();

        $response = $this->get(route('levels.show', $level));
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LevelController::class,
            'update',
            \App\Http\Requests\LevelUpdateRequest::class
        );
    }

    #[Test]
    public function update_saves_and_redirects(): void
    {
        $level = Level::factory()->create();
        $name = $this->faker->name();

        $response = $this->put(route('levels.update', $level), [
            'name' => $name,
        ]);

        $levels = Level::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $levels);
        $level = $levels->first();

        $response->assertRedirect(route('level.index'));
    }


    #[Test]
    public function destroy_deletes(): void
    {
        $level = Level::factory()->create();

        $response = $this->delete(route('levels.destroy', $level));

        $this->assertModelMissing($level);
    }
}
