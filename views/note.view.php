<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . '/components/head.php'; ?>
<body>

<div class="main center">
    <header>
        <div><a href="/note/new">Create note</a></div>
        <div id="exit-account" ><a href="/auth/logout">exit account</a> </div>
    </header>

    <form class="note-create" name="note-create" id="note-create" method="post">

        <label for="title-create">Title</label>
        <textarea class="note-create__title" id="title-create" form="note-create" name="title"></textarea>
        <label for="text-create">Text</label>
        <textarea class="note-create__text" id="text-create" form="note-create" name="text"></textarea>
        <input type="submit" value="Create" name="submit"/>
    </form>
</div>
<script src="/static/js/form.js" type="module"></script>

<?php
include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>
