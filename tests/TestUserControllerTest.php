<?php

namespace Aamatevosyan\LaravelTrashable\Tests;

use Aamatevosyan\LaravelTrashable\Tests\Http\Controllers\TestUserController;
use Aamatevosyan\LaravelTrashable\Tests\Models\TestUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestUserControllerTest extends TestCase
{
    private function assertModelNotFound($fn): void
    {
        $failed = false;

        try {
            $fn();
        } catch (ModelNotFoundException $e) {
            $failed = true;
        }
        self::assertTrue($failed);
    }

    /** @test */
    public function it_returns_model_key(): void
    {
        $controller = new TestUserController;

        self::assertEquals('id', $controller->getModelKey());
    }

    /** @test */
    public function it_returns_model_class(): void
    {
        $controller = new TestUserController;

        self::assertEquals(TestUser::class, $controller->getModelClass());
    }

    /** @test */
    public function it_returns_model_name(): void
    {
        $controller = new TestUserController;

        self::assertEquals(TestUser::class, $controller->getModelClass());
        self::assertEquals('test-user', $controller->getModelName());
    }

    /** @test */
    public function it_gets_only_trashed(): void
    {
        $controller = new TestUserController;

        $trashed = TestUser::factory()->create();
        $trashed->delete();

        $deleted = TestUser::factory()->create();
        $deleted->forceDelete();

        $user = TestUser::factory()->create();

        self::assertEquals($trashed->id, $controller->getOnlyTrashed($trashed->id)->id);

        $this->assertModelNotFound(fn () => $controller->getOnlyTrashed($deleted->id));
        $this->assertModelNotFound(fn () => $controller->getOnlyTrashed($user->id));
    }

    /** @test */
    public function it_gets_without_trashed(): void
    {
        $controller = new TestUserController;

        $trashed = TestUser::factory()->create();
        $trashed->delete();

        $deleted = TestUser::factory()->create();
        $deleted->forceDelete();

        $user = TestUser::factory()->create();

        self::assertEquals($user->id, $controller->getWithoutTrashed($user->id)->id);

        $this->assertModelNotFound(fn () => $controller->getWithoutTrashed($deleted->id));
        $this->assertModelNotFound(fn () => $controller->getWithoutTrashed($trashed->id));
    }

    /** @test */
    public function it_gets_with_trashed(): void
    {
        $controller = new TestUserController;

        $trashed = TestUser::factory()->create();
        $trashed->delete();

        $deleted = TestUser::factory()->create();
        $deleted->forceDelete();

        $user = TestUser::factory()->create();

        self::assertEquals($user->id, $controller->getWithTrashed($user->id)->id);
        self::assertEquals($trashed->id, $controller->getWithTrashed($trashed->id)->id);

        $this->assertModelNotFound(fn () => $controller->getWithoutTrashed($deleted->id));
    }
}
