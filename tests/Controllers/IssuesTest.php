<?php

namespace Tests\Controllers;

use Avalon\Testing\TestSuite;
use Traq\Models\Project;

TestSuite::tests(function ($suite) {
    $suite->group("Issues Controller", function ($g) {
        // Get project
        $project = Project::find(1);

        // Index
        $g->test("List issues", function ($t) use ($project) {
            $t->shouldContain(
                $t->visit('issues', ['routeTokens' => ['project_slug' => $project->slug]]),
                '<h1 class="page-header">Issues</h1>'
            );
        });
    });
});
