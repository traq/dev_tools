# Development Notes

## Timeline

### Events and actions

Events are database rows. Actions are stored in events as JSON.

Actions are saved with the event action, time, and any corresponding data, such
as an issue ID, the milestone ID and so on.

When inserting a new event, check the last event, if it's by the same user,
append the action to that event.

We then potentially end up with the following:

    5:55pm Defect #123 created: Something is broked!
    5:43pm Feature #122 commented on: Add this useful thing
    by SomeoneAlive

This will of course be done on a per-day basis, so events from a Friday wont be
grouped with an event on a Saturday.

## Permissions

The permission system is going to be completely overhauled.

Instead of permissions being stored in their own table with each row being a
permission. They will be stored with their relating object.

For example, Role permissions will be stored with the role as JSON.

The permissions from the user's group and role will then be merged, example:

    // Regular user group
    $group_permissions = [
        'create_issues'
    ];

    // Developer role
    $role_permissions [
        'update_issues'
    ];

    // Merge permissions
    $permissions = array_merge($group_permissions, $role_permissions);

Then checking a user has permission is as simple as `in_array($permission, $permisions)`.
