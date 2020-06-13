<div id="animalslist">
    Liste des animaux:
    <table class="table">
        <tr>
            <th>Animal</th>
        </tr>
        <?php foreach($this->animals as $animal):?>
            <tr class="animal <?php echo($animal['status'])?'active':'' ?>">
                <td>
                    <a href="show.php?id=<?php echo $animal['id'];?>">
                         <?php echo $animal['name'];?>
                    </a>
                </td>

                <td>
                    <img src="<?php echo BASE_PATH;?>/images/animals/<?php echo $animal['hash'];?>/image_full.jpg" width="20px"/>
                </td>
                <td>
                    <?php echo($animal['status'])?'Actif':'Désactivé' ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $animal['id'];?>">
                        Modifier
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
<a href="edit.php">
    Ajouter
</a>
</div>

