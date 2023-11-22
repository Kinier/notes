<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . '/components/head.php'; ?>
<body>

<div class="main">
    <header>
        <div><a href="/note/new">Create note</a></div>
        <div><a href="/">Main page</a></div>
        <div><a href="/note/delete?id=<?= $data['note']['id'] ?>">Delete note</a></div>

        <div id="exit-account" ><a href="/auth/logout">exit account</a> </div>
    </header>

    <div class="note-preview">
        <?php
            if (isset($data)){?>
                <div class="note-preview__title"><?= $data['note']['title'] ?></div>
                <div class="note-preview__text"><?= $data['note']['text'] ?></div>
            <?php }
        ?>
    </div>

</div>
<script src="/static/js/form.js" type="module"></script>

<?php
include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>
