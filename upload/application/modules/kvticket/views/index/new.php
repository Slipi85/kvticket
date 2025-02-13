<h1><?=$this->getTrans('entry') ?></h1>
<form method="POST" class="form-horizontal" action="">
    <?=$this->getTokenField() ?>
    <div class="form-group">
        <label for="cat" class="col-lg-2 control-label">
            <?=$this->getTrans('cat') ?>
        </label>
        <div class="col-lg-4">
            <select class="form-control" id="cat" name="cat">
                <option value="0" selected><?=$this->getTrans('noSelection') ?></option>
            <?php foreach ($this->get('cats') as $cat): ?>
                <option value="<?=$cat->getId() ?>"><?=$this->escape($cat->getTitle()) ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('title') ? 'has-error' : '' ?>">
        <label for="title" class="col-lg-2 control-label">
            <?=$this->getTrans('title') ?>
        </label>
        <div class="col-lg-8">
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="<?=$this->originalInput('title') ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
        <label for="text" class="col-lg-2 control-label">
            <?=$this->getTrans('desc') ?>
        </label>
        <div class="col-lg-8">
            <textarea class="form-control ckeditor"
                      id="text"
                      name="text"
                      toolbar="ilch_html_frontend"
                      rows="5"><?=$this->originalInput('text') ?></textarea>
        </div>
    </div>
    <?php if ($this->get('captchaNeeded')) : ?>
    <div class="form-group <?=$this->validation()->hasError('captcha') ? 'has-error' : '' ?>">
        <label class="col-lg-2 control-label">
            <?=$this->getTrans('captcha') ?>
        </label>
        <div class="col-lg-8">
            <?=$this->getCaptchaField() ?>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('captcha') ? 'has-error' : '' ?>">
        <div class="col-lg-offset-2 col-lg-3 input-group captcha">
            <input type="text"
                   class="form-control"
                   id="captcha-form"
                   name="captcha"
                   autocomplete="off"
                   placeholder="<?=$this->getTrans('captcha') ?>" />
            <span class="input-group-addon">
                <a href="javascript:void(0)" onclick="
                        document.getElementById('captcha').src='<?=$this->getUrl() ?>/application/libraries/Captcha/Captcha.php?'+Math.random();
                        document.getElementById('captcha-form').focus();"
                   id="change-image">
                    <i class="fa-solid fa-arrows-rotate"></i>
                </a>
            </span>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-offset-2 col-lg-10">
            <?=$this->getSaveBar('addButton', 'Ticket') ?>
        </div>
    </div>
</form>
