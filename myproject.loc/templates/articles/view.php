<?php include __DIR__ . '/../header.php'; ?>
<h1><?= $article->getName() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

<?php if( $user !== null && $user->getRole() === 'admin'): ?>
    <p><a href="http://myproject.loc/articles/<?= $article->getId() ?>/edit">Редактировать статью</a></p>
<?php endif; ?>


<?php if($user !== null ):?>
    <form action="/articles/<?= $article->getId() ?>/comment" method="post">

        <label for="text">Текст комментария</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? $comment->getText() ?></textarea><br>
        <br>
        <input type="submit" value="Добавить">
    </form>
<?php else: ?>
    <a href="http://myproject.loc/users/login">Войти</a> | <a href="http://myproject.loc/users/register">Зарегистрироваться для комментариев</a>

<?php endif; ?>


<?php foreach ($comments as $comment): ?>
    <h2> Комментарий:<?= $article->getId() ?></a></h2>
    <p><?= $comment->getText() ?></p>
        <hr>
        <?php endforeach; ?>


<?php include __DIR__ . '/../footer.php'; ?>
<!--<h2>--><?php //= $author['nickname'] ?><!--</h2>-->
