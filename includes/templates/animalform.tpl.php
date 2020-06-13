<form action="<?php echo BASE_PATH.'animals/actions/save.php'?>" method="POST" >

    <label>Nom:</label>
    <input type="hidden" name="id" value="<?php echo $this->id;?>" />
    <input type="text" name="name" value="<?php echo addslashes($this->name)?>" /><br/>
    <input name="image" type="file" accept="image/jpeg" />
    Image: <img src="<?php echo BASE_PATH;?>/images/animals/<?php echo $this->hash;?>/image_full.jpg" width="400px"/>
<input type="submit" value="Enregistrer"/>
</form>
