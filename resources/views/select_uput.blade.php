<select name="uput_id">
    <?php
    foreach($data as $red)
        {
    ?>
        <option value="<?=$red->uput_id?>" 
        <?php
            if($spec == $red->uput_id)
                echo "selected='selected'";
        ?>
        >
        <?=$red->specijalista?>
        </option>
    <?php
        }

    ?>
</select>