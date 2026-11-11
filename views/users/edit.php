<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <h1><?= $user->id ? 'Edit User' : 'New User' ?></h1>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
    <form action="<?= $user->id ? '/admin/users/edit?id=' . (int) $user->id : '/admin/users' ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="<?= htmlspecialchars((string) $user->name, ENT_QUOTES, 'UTF-8') ?>" maxlength="1024" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" value="<?= htmlspecialchars((string) $user->email, ENT_QUOTES, 'UTF-8') ?>" maxlength="255" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" autocomplete="new-password" <?= $user->id ? '' : 'required' ?>>
        </div>
        <button type="submit" class="btn btn-primary"><?= $user->id ? 'Update' : 'Create' ?></button>
        <a href="/admin/users" class="btn btn-secondary">Back to users</a>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
