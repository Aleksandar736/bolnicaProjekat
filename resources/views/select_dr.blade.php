<select name="dodeljeni_lekar_id">
    <?php
    foreach($data as $red)
        {
    ?>
        <option value="<?=$red->korisnik_id?>" 
        <?php
            if($doktor_id == $red->korisnik_id)
                echo "selected='selected'";
        ?>
        >
        <?=$red->ime?> <?=$red->prezime?>
        </option>
    <?php
        }

    ?>
</select>