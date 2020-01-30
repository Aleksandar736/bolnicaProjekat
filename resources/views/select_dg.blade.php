<select name="bolest_id">
    <?php
    foreach($data as $red)
        {
    ?>
        <option value="<?=$red->bolest_id?>" 
        <?php
            if($bolesti == $red->bolest_id)
                echo "selected='selected'";
        ?>
        >
        <?=$red->naziv?>
        </option>
    <?php
        }

    ?>
</select>