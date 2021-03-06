<?php

namespace Tests\Controllers;

use Avalon\Testing\TestSuite;

TestSuite::tests(function ($suite) {
    $suite->group("Sessions Controller / Register", function ($g) {
        // Render form
        $g->test("Register Form", function ($t) {
            $t->visit('register');
            $t->shouldContain($t->visit('register'), '<h1 class="page-header">Register</h1>');
        });

        // Create account
        $g->test("Should create account", function ($t) {
            $response = $t->visit('register', [
                'method' => 'POST',
                'post' => [
                    'name'                  => "John Smith",
                    'username'              => "john",
                    'email'                 => "nope@example.com",
                    'password'              => "hello123",
                    'password_confirmation' => "hello123"
                ]
            ]);

            $t->shouldRedirectTo($response, $t->generateUrl('login'));
        });

        // Confirm password
        $g->test("Should not create account", function ($t) {
            $response = $t->visit('register', [
                'method' => 'POST',
                'post' => [
                    'name'                  => "John Smith",
                    'username'              => "john",
                    'email'                 => "nope@example.com",
                    'password'              => "hello123",
                    'password_confirmation' => "hello1233"
                ]
            ]);

            $t->shouldContain($response, '<h1 class="page-header">Register</h1>');
        });
    });

    $suite->group("Sessions Controller / Login", function ($g) {
        // Render form
        $g->test("Login Form", function ($t) {
            $t->shouldContain($t->visit('login'), '<h1>Login</h1>');
        });

        // Login
        // Disabled until new cookie creation system is added.
        // $g->test("Should login", function ($t) {
        //     $response = $t->visit('login', [
        //         'method' => "POST",
        //         'post'   => [
        //             'username' => 'john',
        //             'password' => 'let!!me%%in123'
        //         ]
        //     ]);

        //     $t->assertTrue($response->shouldRedirectTo('root'));
        // });

        // Invalid password
        $g->test("Should not login", function ($t) {
            $response = $t->visit('login', [
                'method' => "POST",
                'post'   => [
                    'username' => 'john',
                    'password' => 'dont let me in'
                ]
            ]);

            $t->shouldContain($t->visit('login'), '<h1>Login</h1>');
        });
    });
});
