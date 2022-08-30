<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . '/components/head.php'; ?>
<body>

<div class="main">
    <header>
        <div>Create note</div>
    </header>

    <div class="notes">
        <?php
        if (isset($data)) {
            foreach ($data['notes'] as $note) {
                ?>
                <div class="note">
                    <div class="note__title"><?= $note['title'] ?> </div>
                    <div class="note__text"><?= $note['text'] ?> </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>
