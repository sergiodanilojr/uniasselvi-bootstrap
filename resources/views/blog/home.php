<?php $this->layout('blog::_layout', [ 'title'=> $title ]) ?>

<section class="blog-section">
    <?php foreach ($users as $user) : ?>
        <article class="card">
            <h2 class="title"><?= $this->e($user->name) ?></h2>
            <p class="description"><?= $this->e($user->email) ?></p>
        </article>
    <?php endforeach; ?>
</section>