<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('access dashboard page', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('dashboard'))
        ->assertStatus(200);
});
