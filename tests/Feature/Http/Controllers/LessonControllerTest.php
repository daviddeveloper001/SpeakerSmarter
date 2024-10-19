<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Lession;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LessonController
 */
final class LessonControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $lessons = Lesson::factory()->count(3)->create();

        $response = $this->get(route('lessons.index'));
    }


    #[Test]
    public function create_behaves_as_expected(): void
    {
        $lesson = Lession::factory()->create();

        $response = $this->get(route('lessons.create'));
    }


    #[Test]
    public function edit_behaves_as_expected(): void
    {
        $lesson = Lesson::factory()->create();
        $lesson = Lession::factory()->create();

        $response = $this->get(route('lessons.edit', $lesson));
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonController::class,
            'store',
            \App\Http\Requests\LessonStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $description = $this->faker->text();
        $image_uri = $this->faker->word();
        $content_uri = $this->faker->word();
        $pdf_uri = $this->faker->word();

        $response = $this->post(route('lessons.store'), [
            'name' => $name,
            'description' => $description,
            'image_uri' => $image_uri,
            'content_uri' => $content_uri,
            'pdf_uri' => $pdf_uri,
        ]);

        $lessons = Lession::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('image_uri', $image_uri)
            ->where('content_uri', $content_uri)
            ->where('pdf_uri', $pdf_uri)
            ->get();
        $this->assertCount(1, $lessons);
        $lesson = $lessons->first();

        $response->assertRedirect(route('lession.index'));
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $lesson = Lesson::factory()->create();
        $lesson = Lession::factory()->create();

        $response = $this->get(route('lessons.show', $lesson));
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonController::class,
            'update',
            \App\Http\Requests\LessonUpdateRequest::class
        );
    }

    #[Test]
    public function update_saves_and_redirects(): void
    {
        $lesson = Lesson::factory()->create();
        $name = $this->faker->name();
        $description = $this->faker->text();
        $image_uri = $this->faker->word();
        $content_uri = $this->faker->word();
        $pdf_uri = $this->faker->word();

        $response = $this->put(route('lessons.update', $lesson), [
            'name' => $name,
            'description' => $description,
            'image_uri' => $image_uri,
            'content_uri' => $content_uri,
            'pdf_uri' => $pdf_uri,
        ]);

        $lessons = Lession::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('image_uri', $image_uri)
            ->where('content_uri', $content_uri)
            ->where('pdf_uri', $pdf_uri)
            ->get();
        $this->assertCount(1, $lessons);
        $lesson = $lessons->first();

        $response->assertRedirect(route('lession.index'));
    }


    #[Test]
    public function destroy_deletes(): void
    {
        $lesson = Lesson::factory()->create();
        $lesson = Lession::factory()->create();

        $response = $this->delete(route('lessons.destroy', $lesson));

        $this->assertModelMissing($lesson);
    }
}
