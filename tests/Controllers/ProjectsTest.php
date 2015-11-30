<?php

namespace Tests\Controllers;

use Avalon\Testing\TestSuite;
use Traq\Models\Project;

TestSuite::tests(function ($suite) {
    $suite->group("Projects Controller", function ($g) {
        // Get project
        $project = Project::find(1);

        // Index
        $g->test("List projects", function ($t) use ($project) {
            $t->shouldContain($t->visit('root'), $project->slug);
        });

        // View project
        $g->test("Show project", function ($t) use ($project) {
            $t->shouldContain(
                $t->visit('show_project', [
                    'routeTokens' => [
                        'project_slug' => $project->slug
                    ]
                ]),
                '<h1 class="page-header">' . $project->name . '</h1>'
            );
        });
    });
});
