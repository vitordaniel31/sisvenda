<?php

use App\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list paymentMethods with permission', function () {
    $user = createUserForActing('paymentMethods.read');

    $this->actingAs($user)->get(route('paymentMethods.index'))
        ->assertStatus(200);
});

it('list paymentMethods without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('paymentMethods.index'))
        ->assertStatus(403);
});

it('access paymentMethod create page with permission', function () {
    $user = createUserForActing('paymentMethods.create');

    $this->actingAs($user)->get(route('paymentMethods.create'))
        ->assertStatus(200);
});

it('access paymentMethod create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('paymentMethods.create'))
        ->assertStatus(403);
});

it('store a paymentMethod with permission', function () {
    $user = createUserForActing('paymentMethods.create');

    $this->actingAs($user)
        ->post(route('paymentMethods.store', [
            'name_id' => 2,
            'pix_id' => null,
            'notes' => "MasterTeste"
        ]))
        ->assertRedirect(route('paymentMethods.show', PaymentMethod::latest('id')->first()));
});

it('store a paymentMethod without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(route('paymentMethods.store', [
        'name_id' => 3,
        'pix_id' => null,
        'notes' => "VisaTeste"
    ]))->assertStatus(403);
});

it('access paymentMethod edit page with permission', function () {
    $user = createUserForActing('paymentMethods.update');

    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->get(route('paymentMethods.edit', $paymentMethod))
        ->assertStatus(200);
});

it('access paymentMethod edit page without permission', function () {
    $user = createUserForActing();

    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->get(route('paymentMethods.edit', $paymentMethod))
        ->assertStatus(403);
});

it('update a paymentMethod with permission', function () {
    $user = createUserForActing('paymentMethods.update');

    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->put(route('paymentMethods.update', $paymentMethod), [
        'name_id' => 2,
        'pix_id' => null,
        'notes' => "MasterTeste update"
    ])->assertRedirect(route('paymentMethods.show', $paymentMethod));
});

it('update a paymentMethod without permission', function () {
    $user = createUserForActing();
    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->put(route('paymentMethods.update', $paymentMethod), [
        'name_id' => 3,
        'pix_id' => null,
        'notes' => "visa update"
    ])->assertStatus(403);
});

it('show a paymentMethod with permission', function () {
    $user = createUserForActing('paymentMethods.read');
    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->get(route('paymentMethods.show', $paymentMethod))
        ->assertStatus(200);
});

it('show a paymentMethod without permission', function () {
    $user = createUserForActing();
    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->get(route('paymentMethods.show', $paymentMethod))
        ->assertStatus(403);
});

it('show a not found paymentMethod', function () {
    $user = createUserForActing('paymentMethods.read');
    $notFoundProductId = PaymentMethod::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('paymentMethods.show', $notFoundProductId))
        ->assertStatus(404);
});

it('delete a paymentMethod with permission', function () {
    $user = createUserForActing('paymentMethods.delete');
    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->delete(route('paymentMethods.destroy', $paymentMethod))
        ->assertRedirect(route('paymentMethods.index'));
});

it('delete a paymentMethod without permission', function () {
    $user = createUserForActing();
    $paymentMethod = PaymentMethod::factory()->create();

    $this->actingAs($user)->delete(route('paymentMethods.destroy', $paymentMethod))
        ->assertStatus(403);
});

it('test paymentMethod type cash', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 0;

    $this->assertEquals(PaymentMethod::NAME_CASH, $paymentMethod->name);
});

it('test paymentMethod type ticket', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 1;

    $this->assertEquals(PaymentMethod::NAME_TICKET, $paymentMethod->name);
});

it('test paymentMethod type creditcard', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 2;

    $this->assertEquals(PaymentMethod::NAME_CREDITCARD, $paymentMethod->name);
});

it('test paymentMethod type debitcard', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 3;

    $this->assertEquals(PaymentMethod::NAME_DEBITCARD, $paymentMethod->name);
});

it('test paymentMethod type pix', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 4;

    $this->assertEquals(PaymentMethod::NAME_PIX, $paymentMethod->name);
});

it('test paymentMethod type nulled', function () {
    $paymentMethod = new PaymentMethod();
    $paymentMethod->name_id = 999;

    $this->assertNull($paymentMethod->name);
});