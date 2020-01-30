<?php 
$id_prepisanih_lekova = [];
$kolicine_prepisanih_lekova = [];

foreach($prepisani_lekovi as $prepisani_lek) {
    $id_prepisanih_lekova[] = $prepisani_lek->lek_id;
    $kolicine_prepisanih_lekova[$prepisani_lek->lek_id] = $prepisani_lek->pivot->kolicina;
}
?>
<div class="lekovi-items" style="height: 150px; overflow: auto">
<?php foreach($data as $red) { ?>
    <div class="lek-item">
        <span class="display:block;float:left"><?=$red->naziv?></span>
        <input type="number" name="prepisana_kolicina[<?=$red->lek_id?>]" <?php if(in_array($red->lek_id, $id_prepisanih_lekova)) { ?>value="<?=$kolicine_prepisanih_lekova[$red->lek_id]?>"<?php } ?> min="0" style="margin-right:10px;width:40px;float:left" />
        <input type="checkbox" name="prepisani_lekovi[]" value="<?=$red->lek_id?>" <?php if(in_array($red->lek_id, $id_prepisanih_lekova)) { ?>checked<?php } ?> class="float:left" />
        <div style="clear: both"></div>
    </div>
<?php } ?>
</div>