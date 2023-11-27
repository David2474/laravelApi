<?php

uses(Tests\TestCase::class);


it('vista de login', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('login incorrecto', function(){
    $response = $this->post('/login', [
        'email' => 'test@test.com',
        'password' => '12345',
    ]);

    $this->assertGuest();
});


it('email con numeros', function(){
    $response = $this->post('/login', [
        'email' => '1',
        'password' => '123123123',
    ]);

    $response->assertInvalid('email');
    $this->assertGuest();
});


it('contraseña de al menos 8 caracteres', function () {
    $response = $this->post('/register', [
        'name' => 'David',
        'email' => 'dg427938@test.com',
        'password' => '12345',
    ]);

    $response->assertSessionHasErrors('password', 'Constraseña invalida, la contraseña debe tener al menos 8 caracteres');
});


it('password incorrecto', function(){
    $response = $this->post('/login',[
        'email' => 'dg427938@gmail.com',
        'password' => '1234',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});


it('campos vacios', function(){
    $response = $this->post('/login',[
        'email' => '',
        'password' => '',
    ]);

    $response->assertSessionHasErrors(['email', 'password']);
});

it('Campo password vacio', function(){
    $response = $this->post('/login', [
        'email' => 'dg427938@gmail.com',
        'password' => '',
    ]);

    $response->assertInvalid('password');
});


it('Campo email vacio', function(){
    $response = $this->post('/login', [
        'email' => '',
        'password' => '123123123',
    ]);

    $response->assertInvalid('email');
});


it('Email invalido', function(){
    $response = $this->post('/login', [
        'email' => 'davidgutierrez.com',
        'password' => '12345678',
    ]);
    $response->assertInvalid('email');
});


it('Inyeccion SQL', function(){
    $response = $this->post('/login', [
        'email' => "'OR '1' = '1",
        'password' => "'OR '1' = '1",
    ]);
    $this->assertGuest();
});


it('logout', function(){
    $user = App\Models\User::factory()->create();
    $response = $this->actingAs($user)->post('/logout');
    $this->assertGuest();
    $response->assertRedirect('/');
});

