<form action="<?php echo BASE_PATH.'animals/actions/save.php'?>" method="POST" enctype="multipart/form-data">
<div class="row">

    <input type="hidden" name="id" value="<?php echo $this->id;?>" />
</div>
<div class="row">
    <label>Nom</label>
    <input type="text" name="name" value="<?php echo addslashes($this->name)?>" /><br/>
</div>
    <?php if(file_exists( FILE_PATH.'/images/animals/'.$this->hash.'/image_full.jpg' )):?>
<div class="row">
    <label>Image</label><img src="<?php echo BASE_PATH;?>/images/animals/<?php echo $this->hash;?>/image_full.jpg" width="400px"/>
</div>
    <?php endif;?>
<div class="row">
    <input name="imageFile" type="file" accept="image/jpeg" /><br/>
</div>
<div class="row">
    <lable for="status">Status</lable>
    <input id="status" type="checkbox" name="status" value="1" <?php echo ($this->status)?'checked="checked"':'';?> />
</div>

    <input type="submit" value="Enregistrer"/>
</form>
