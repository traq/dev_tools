<?php
/*!
 * Traq
 * Copyright (C) 2009-2015 Jack Polgar
 * Copyright (C) 2012-2015 Traq.io
 * https://github.com/nirix
 * https://traq.io
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

$usergroups = [
    // Defaults
    'defaults' => [
        // Projects
        'view'                   => true,
        'project_settings'       => false,
        'delete_timeline_events' => false,

        // Tickets
        'view_tickets'            => true,
        'create_tickets'          => true,
        'update_tickets'          => true,
        'delete_tickets'          => false,
        'move_tickets'            => false,
        'comment_on_tickets'      => true,
        'edit_ticket_description' => false,
        'vote_on_tickets'         => true,
        'add_attachments'         => true,
        'view_attachments'        => true,
        'delete_attachments'      => false,
        'perform_mass_actions'    => false,

        // Set ticket properties
        'ticket_properties_set_assigned_to'     => false,
        'ticket_properties_set_milestone'       => true,
        'ticket_properties_set_version'         => true,
        'ticket_properties_set_component'       => false,
        'ticket_properties_set_severity'        => false,
        'ticket_properties_set_priority'        => false,
        'ticket_properties_set_status'          => false,
        'ticket_properties_set_tasks'           => false,
        'ticket_properties_set_related_tickets' => false,

        // Change ticket properties
        'ticket_properties_change_type'            => false,
        'ticket_properties_change_assigned_to'     => false,
        'ticket_properties_change_milestone'       => false,
        'ticket_properties_change_version'         => false,
        'ticket_properties_change_component'       => true,
        'ticket_properties_change_severity'        => false,
        'ticket_properties_change_priority'        => false,
        'ticket_properties_change_status'          => false,
        'ticket_properties_change_summary'         => false,
        'ticket_properties_change_tasks'           => false,
        'ticket_properties_change_related_tickets' => false,
        'ticket_properties_complete_tasks'         => false,

        // Ticket history
        'edit_ticket_history'   => false,
        'delete_ticket_history' => false,

        // Wiki page
        'create_wiki_page' => false,
        'edit_wiki_page'   => false,
        'delete_wiki_page' => false
    ],

    // Guests
    'guests' => [
        'create_tickets'     => false,
        'comment_on_tickets' => false,
        'update_tickets'     => false,
        'vote_on_tickets'    => false,
        'add_attachments'    => false
    ]
];

$roles = [
    // Defaults
    'defaults' => [
        // Projects
        'view'                   => true,
        'project_settings'       => false,
        'delete_timeline_events' => false,

        // Tickets
        'view_tickets'            => true,
        'create_tickets'          => true,
        'update_tickets'          => true,
        'delete_tickets'          => false,
        'move_tickets'            => false,
        'comment_on_tickets'      => true,
        'edit_ticket_description' => false,
        'vote_on_tickets'         => true,
        'add_attachments'         => true,
        'view_attachments'        => true,
        'delete_attachments'      => false,
        'perform_mass_actions'    => false,

        // Set ticket properties
        'ticket_properties_set_assigned_to'     => true,
        'ticket_properties_set_milestone'       => true,
        'ticket_properties_set_version'         => true,
        'ticket_properties_set_component'       => true,
        'ticket_properties_set_severity'        => true,
        'ticket_properties_set_priority'        => true,
        'ticket_properties_set_status'          => true,
        'ticket_properties_set_tasks'           => true,
        'ticket_properties_set_related_tickets' => true,

        // Change ticket properties
        'ticket_properties_change_type'            => true,
        'ticket_properties_change_assigned_to'     => true,
        'ticket_properties_change_milestone'       => true,
        'ticket_properties_change_version'         => true,
        'ticket_properties_change_component'       => true,
        'ticket_properties_change_severity'        => true,
        'ticket_properties_change_priority'        => true,
        'ticket_properties_change_status'          => true,
        'ticket_properties_change_summary'         => true,
        'ticket_properties_change_tasks'           => true,
        'ticket_properties_change_related_tickets' => true,
        'ticket_properties_complete_tasks'         => true,

        // Ticket history
        'edit_ticket_history'   => false,
        'delete_ticket_history' => false,

        // Wiki page
        'create_wiki_page' => false,
        'edit_wiki_page'   => false,
        'delete_wiki_page' => false
    ],

    // Managers
    'managers' => [
        // Projects
        'project_settings'       => true,
        'delete_timeline_events' => true,

        // Tickets
        'delete_tickets'          => true,
        'move_tickets'            => true,
        'edit_ticket_description' => true,
        'delete_attachments'      => true,
        'edit_ticket_history'     => true,
        'delete_ticket_history'   => true,
        'perform_mass_actions'    => true,

        // Wiki
        'create_wiki_page' => true,
        'edit_wiki_page'   => true,
        'delete_wiki_page' => true
    ]
];
?>
<h1>Permissions</h1>

<h2>User groups</h2>

<h3>Defaults</h3>
<textarea><?=json_encode($usergroups['defaults'])?></textarea>

<h3>Guests</h3>
<textarea><?=json_encode($usergroups['guests'])?></textarea>

<h2>Roles</h2>

<h3>Defaults</h3>
<textarea><?=json_encode($roles['defaults'])?></textarea>

<h3>Managers</h3>
<textarea><?=json_encode($roles['managers'])?></textarea>
