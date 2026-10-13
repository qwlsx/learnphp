<?php include __DIR__ . '/partials/header.php'; ?>

<main class="container my-5">
    <h1>PHP Forms</h1>

    <h2>GET Form</h2>
    <form action="/form" method="GET">
        <div class="mb-3">
            <label for="get-name" class="form-label">Your name</label>
            <input type="text" class="form-control" id="get-name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Send GET</button>
    </form>

    <hr>

    <h2>POST Form</h2>
    <form action="/form" method="POST">
        <div class="mb-3">
            <label for="post-name" class="form-label">Your name</label>
            <input type="text" class="form-control" id="post-name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Send POST</button>
    </form>

    <?php if (isset($message)): ?>
        <div class="alert alert-info mt-4">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>