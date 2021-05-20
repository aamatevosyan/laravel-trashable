<?php

namespace Aamatevosyan\LaravelTrashable\Tests;

use Aamatevosyan\LaravelTrashable\Tests\Models\TestUser;

class TestUserTest extends TestCase
{
    /** @test */
    public function it_can_be_created(): void
    {
        $user = TestUser::factory()->create();

        self::assertNotNull($user->created_at);
    }

    /** @test */
    public function it_can_be_softdeleted(): void
    {
        $user = TestUser::factory()->create();

        $user->delete();

        $this->assertSoftDeleted($user);
    }

    /** @test */
    public function it_can_be_forcedeleted(): void
    {
        $user = TestUser::factory()->create();

        $user->forceDelete();

        $this->assertDeleted($user);
    }

    /** @test */
    public function it_can_be_restored(): void
    {
        $user = TestUser::factory()->create();

        $user->delete();

        $this->assertSoftDeleted($user);

        $user->restore();

        self::assertFalse($user->trashed());
    }
}
