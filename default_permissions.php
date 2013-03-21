<?php
/*!
 * Traq
 * Copyright (C) 2009-2012 Traq.io
 *
 * This file is part of Traq.
 *
 * Traq is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 *
 * Traq is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Traq. If not, see <http://www.gnu.org/licenses/>.
 */

// This file prints out queries to setup the default permissions.

header("Content-type: text/plain");
$queries = array();
$permission_id = 0;

const DEFAULT_ID = 0;
const GUEST_ID   = 3;
const MANAGER_ID = 1;

$permissions = array(
    // Usergroup permissions
    'usergroup' => array(
        //------------------------------------------
        // Defaults

        // Projects
        array(DEFAULT_ID, 'view',             1),
        array(DEFAULT_ID, 'project_settings', 0),

        // Tickets
        array(DEFAULT_ID, 'create_tickets',            1),
        array(DEFAULT_ID, 'update_tickets',            1),
        array(DEFAULT_ID, 'delete_tickets',            0),
        array(DEFAULT_ID, 'move_tickets',              0),
        array(DEFAULT_ID, 'comment_on_tickets',        1),
        array(DEFAULT_ID, 'edit_ticket_description',   0),
        array(DEFAULT_ID, 'vote_on_tickets',           1),
        array(DEFAULT_ID, 'add_attachments',           1),
        array(DEFAULT_ID, 'view_attachments',          1),
        array(DEFAULT_ID, 'delete_attachments',        0),
        array(DEFAULT_ID, 'set_all_ticket_properties', 0),

        // Ticket History
        array(DEFAULT_ID, 'edit_ticket_history',   0),
        array(DEFAULT_ID, 'delete_ticket_history', 0),

        // Wiki
        array(DEFAULT_ID, 'create_wiki_page', 0),
        array(DEFAULT_ID, 'edit_wiki_page',   0),
        array(DEFAULT_ID, 'delete_wiki_page', 0),

        //------------------------------------------
        // Guests

        // Tickets
        array(GUEST_ID, 'create_tickets',     0),
        array(GUEST_ID, 'comment_on_tickets', 0),
        array(GUEST_ID, 'update_tickets',     0),
        array(GUEST_ID, 'vote_on_tickets',    0),
        array(GUEST_ID, 'add_attachments',    0)
    ),
    // Role permissions
    'role' => array(
        //------------------------------------------
        // Defaults

        // Projects
        array(DEFAULT_ID, 'view',             1),
        array(DEFAULT_ID, 'project_settings', 0),

        // Tickets
        array(DEFAULT_ID, 'create_tickets',            1),
        array(DEFAULT_ID, 'update_tickets',            1),
        array(DEFAULT_ID, 'delete_tickets',            0),
        array(DEFAULT_ID, 'move_tickets',              0),
        array(DEFAULT_ID, 'comment_on_tickets',        1),
        array(DEFAULT_ID, 'edit_ticket_description',   0),
        array(DEFAULT_ID, 'vote_on_tickets',           1),
        array(DEFAULT_ID, 'add_attachments',           1),
        array(DEFAULT_ID, 'view_attachments',          1),
        array(DEFAULT_ID, 'delete_attachments',        0),
        array(DEFAULT_ID, 'set_all_ticket_properties', 1),

        // Ticket History
        array(DEFAULT_ID, 'edit_ticket_history',   0),
        array(DEFAULT_ID, 'delete_ticket_history', 0),

        // Wiki
        array(DEFAULT_ID, 'create_wiki_page', 0),
        array(DEFAULT_ID, 'edit_wiki_page',   0),
        array(DEFAULT_ID, 'delete_wiki_page', 0),

        //------------------------------------------
        // Managers

        // Projects
        array(MANAGER_ID, 'project_settings', 1),

        // Tickets
        array(MANAGER_ID, 'delete_tickets',          1),
        array(MANAGER_ID, 'move_tickets',            1),
        array(MANAGER_ID, 'edit_ticket_description', 1),
        array(MANAGER_ID, 'delete_attachments',      1),
        array(MANAGER_ID, 'edit_ticket_history',     1),
        array(MANAGER_ID, 'delete_ticket_history',   1),

        // Wiki
        array(MANAGER_ID, 'create_wiki_page', 1),
        array(MANAGER_ID, 'edit_wiki_page',   1),
        array(MANAGER_ID, 'delete_wiki_page', 1)
    )
);

// Permission types (usergroup/role)
foreach ($permissions as $type => $permissions) {
    $queries[] = "# {$type}";

    // Permissions
    foreach ($permissions as $permission) {
        $permission_id++;
        $queries[] = "INSERT INTO traq_permissions VALUES({$permission_id}, 0, '{$type}', {$permission[0]}, '{$permission[1]}', {$permission[2]});";
    }
}

print(implode(PHP_EOL, $queries));
