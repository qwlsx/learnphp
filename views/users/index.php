<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <h1>Users</h1>
    <a href="/admin/users/create" class="btn btn-primary mb-3">New User</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Created</th><th>Updated</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= (int) $user->id ?></td>
                    <td><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) $user->created_at, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) $user->updated_at, ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <form action="/admin/users/delete?id=<?= (int) $user->id ?>" method="POST" class="btn-group">
                            <a href="/admin/users/view?id=<?= (int) $user->id ?>" class="btn btn-info">View</a>
                            <a href="/admin/users/edit?id=<?= (int) $user->id ?>" class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (!$users): ?>
                <tr><td colspan="6">No users found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
