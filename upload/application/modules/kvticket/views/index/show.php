<?php
$catMapper = $this->get('catMapper');
$userMapper = $this->get('userMapper');

$ticket = $this->get('ticket');
$creator = $userMapper->getUserById($ticket->getCreator());
$editor = $userMapper->getUserById($ticket->getEditor());
$createdAt = new \Ilch\Date($ticket->getCreatedAt());
$updatedAt = new \Ilch\Date($ticket->getUpdatedAt());
?>

<h1><?=$ticket->getTitle() ?></h1>
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('status') ?></b>
    </div>
    <div class="col-lg-8">
        <?php if ($ticket->getStatus() == 1) {
            echo $this->getTrans('editTickets');
        } elseif ($ticket->getStatus() == 2) {
            echo $this->getTrans('compTickets');
        } elseif ($ticket->getStatus() == 3) {
            echo $this->getTrans('closeTickets');
        } else {
            echo $this->getTrans('openTickets');
        } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('creator') ?></b>
    </div>
    <div class="col-lg-8">
        <?=($creator) ? $creator->getName() : '' ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('editor') ?></b>
    </div>
    <div class="col-lg-8">
        <?=($editor) ? $editor->getName() : '' ?>
    </div>
</div>
<br />
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('createdAt') ?></b>
    </div>
    <div class="col-lg-8">
        <?=$createdAt->format('d.m.Y H:i') ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('updatedAt') ?></b>
    </div>
    <div class="col-lg-8">
        <?=$updatedAt->format('d.m.Y H:i') ?>
    </div>
</div>
<?php if ($ticket && $ticket->getCat() > 0): ?>
<?php $cat = $catMapper->getCategoryById($ticket->getCat()); ?>
<div class="row">
    <div class="col-lg-2">
        <b><?=$this->getTrans('cat') ?></b>
    </div>
    <div class="col-lg-8">
        <?=$cat->getTitle() ?>
    </div>
</div>
<?php endif; ?>
<br />
<div class="row">
    <div class="col-lg-12">
        <b><?=$this->getTrans('desc') ?></b>
    </div>
    <div class="col-lg-12">
        <?=$ticket->getText() ?>
    </div>
</div>
<br />
<div class="btn btn-default">
    <a href="<?=$this->getUrl(['action' => 'index']) ?>">
        <?=$this->getTrans('back') ?>
    </a>
</div>
