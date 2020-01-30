<select name="uloga">
    <?php
    foreach($data as $red)
        {
    ?>
        <option value="<?=$red->id?>" 
        <?php
            if($ulo == $red->id)
                echo "selected='selected'";
        ?>
        >
        <?=$red->naziv?>
        </option>
    <?php
        }

    ?>
</select>