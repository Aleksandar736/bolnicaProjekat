<select name="pol">
    <?php
    foreach($data as $red)
        {
    ?>
        <option value="<?=$red->pol?>" 
        <?php
            if($pol == $red->pol)
                echo "selected='selected'";
        ?>
        >
        <?=$red->pol?>
        </option>
    <?php
        }

    ?>
</select>