<?php

use App\Models\Admin;
use App\Models\Speciality;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->admin = Admin::factory()->create([
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
    ]);
});

it('redirects guests from specialities index', function () {
    $this->get(route('admin.specialities.all'))
        ->assertRedirect(route('admin.login'));
});

it('displays all specialities for admin', function () {
    $speciality = Speciality::factory()->create(['name' => 'Cardiology']);

    $this->actingAs($this->admin, 'admin')
        ->get(route('admin.specialities.all'))
        ->assertOk()
        ->assertSee('Cardiology')
        ->assertSee('#SP'.str_pad((string) $speciality->id, 3, '0', STR_PAD_LEFT));
});

it('displays add speciality page for admin', function () {
    $this->actingAs($this->admin, 'admin')
        ->get(route('admin.specialities.create'))
        ->assertOk()
        ->assertSee('Add Speciality');
});

it('displays edit speciality page for admin', function () {
    $speciality = Speciality::factory()->create(['name' => 'Cardiology']);

    $this->actingAs($this->admin, 'admin')
        ->get(route('admin.specialities.edit', $speciality))
        ->assertOk()
        ->assertSee('Edit Speciality')
        ->assertSee('Cardiology');
});

it('stores a new speciality', function () {
    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.specialities.store'), [
            'name' => 'Neurology',
        ])
        ->assertRedirect(route('admin.specialities.all'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('specialities', [
        'name' => 'Neurology',
    ]);
});

it('stores a speciality with image', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('speciality.jpg');

    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.specialities.store'), [
            'name' => 'Orthopedic',
            'image' => $file,
        ])
        ->assertRedirect(route('admin.specialities.all'));

    $speciality = Speciality::where('name', 'Orthopedic')->first();

    expect($speciality)->not->toBeNull();
    Storage::disk('public')->assertExists($speciality->image);
});

it('updates an existing speciality', function () {
    $speciality = Speciality::factory()->create(['name' => 'Dentist']);

    $this->actingAs($this->admin, 'admin')
        ->put(route('admin.specialities.update', $speciality), [
            'name' => 'Pediatrics',
        ])
        ->assertRedirect(route('admin.specialities.all'))
        ->assertSessionHas('success');

    expect($speciality->fresh()->name)->toBe('Pediatrics');
});

it('deletes a speciality', function () {
    $speciality = Speciality::factory()->create(['name' => 'Urology']);

    $this->actingAs($this->admin, 'admin')
        ->delete(route('admin.specialities.destroy', $speciality))
        ->assertRedirect(route('admin.specialities.all'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('specialities', [
        'id' => $speciality->id,
    ]);
});

it('validates required name on store', function () {
    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.specialities.store'), [
            'name' => '',
        ])
        ->assertSessionHasErrors('name');
});

it('redirects legacy spcialities route to all specialities', function () {
    $this->actingAs($this->admin, 'admin')
        ->get(route('admin.spcialities'))
        ->assertRedirect('/admin/all/specialities');
});
