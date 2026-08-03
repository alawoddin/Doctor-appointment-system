<?php

use App\Models\Admin;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->admin = Admin::factory()->create([
        'first_name' => 'Ryan',
        'last_name' => 'Taylor',
        'email' => 'admin@example.com',
        'password' => 'password',
        'phone' => '305-310-5857',
        'city' => 'Florida',
        'country' => 'United States',
        'about' => 'Administrator profile about text.',
    ]);
});

it('redirects guests from admin profile page', function () {
    $this->get(route('admin.profile'))
        ->assertRedirect(route('admin.login'));
});

it('displays admin profile with data', function () {
    $this->actingAs($this->admin, 'admin')
        ->get(route('admin.profile'))
        ->assertOk()
        ->assertSee('Ryan Taylor')
        ->assertSee('admin@example.com')
        ->assertSee('305-310-5857')
        ->assertSee('Administrator profile about text.');
});

it('updates admin profile details', function () {
    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.profile.update'), [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'city' => 'Miami',
            'country' => 'United States',
            'about' => 'Updated about text.',
        ])
        ->assertRedirect()
        ->assertSessionHas('message', 'Profile Updated Successfully');

    $this->admin->refresh();

    expect($this->admin->first_name)->toBe('John')
        ->and($this->admin->last_name)->toBe('Doe')
        ->and($this->admin->email)->toBe('johndoe@example.com')
        ->and($this->admin->phone)->toBe('1234567890');
});

it('updates admin password with valid current password', function () {
    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.profile.password'), [
            'current_password' => 'password',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ])
        ->assertRedirect()
        ->assertSessionHas('message', 'Password Changed Successfully');

    $this->admin->refresh();

    expect(Hash::check('newpassword', $this->admin->password))->toBeTrue();
});

it('rejects admin password update with wrong current password', function () {
    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.profile.password'), [
            'current_password' => 'wrong-password',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ])
        ->assertRedirect()
        ->assertSessionHas('message', 'Current Password Does Not Match');
});

it('uploads admin profile photo', function () {
    if (! is_dir(public_path('upload/admin'))) {
        mkdir(public_path('upload/admin'), 0755, true);
    }

    $file = UploadedFile::fake()->image('profile.jpg');

    $this->actingAs($this->admin, 'admin')
        ->post(route('admin.profile.update'), [
            'first_name' => 'Ryan',
            'last_name' => 'Taylor',
            'email' => 'admin@example.com',
            'profile_photo' => $file,
        ])
        ->assertRedirect()
        ->assertSessionHas('message', 'Profile Updated Successfully');

    $this->admin->refresh();

    expect($this->admin->profile_photo)->not->toBeNull()
        ->and(file_exists(public_path($this->admin->profile_photo)))->toBeTrue();
});
