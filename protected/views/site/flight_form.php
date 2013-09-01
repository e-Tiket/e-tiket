<form action="<?php echo Yii::app()->createUrl("") ?>" method="GET">
    <div class="clear"><input type="radio" name="type_berangkat" value="pergi" checked="checked"> Pergi Saja</div>
    <div class="clear"><input type="radio" name="type_berangkat" value="pulang-pergi" <? echo (Yii::app()->getRequest()->getQuery('type_berangkat') == "pulang-pergi" ? 'checked="checked"' : '') ?>> Pulang Pergi</div>
    <input type="hidden" name="search_type" value="flight"/>
    Dari <div class="clear"></div>
    <select name="from" class="chosen">
        <option value="">- Pilih Bandara -</option>
        <?php
        foreach ($airport as $a) {
            ?><option value="<?php echo $a['airport_code'] ?>" <?php echo $a['airport_code'] == $from ? 'selected' : '' ?>>
                <?php echo $a['location_name'] . '-' . $a['airport_code'] ?>
            </option><?php
        }
        ?>
    </select>
    <div class="clear"></div>
    Ke <div class="clear"></div>
    <select name="to" class="chosen">
        <option value="">- Pilih Bandara -</option>
        <?php
        foreach ($airport as $a) {
            ?><option value="<?php echo $a['airport_code'] ?>" <?php echo $a['airport_code'] == $to ? 'selected' : '' ?>>
                <?php echo $a['location_name'] . '-' . $a['airport_code'] ?>
            </option><?php
        }
        ?>
    </select>
    <div class="clear">Pergi</div>
    <input name="tanggal_berangkat" type="text" class="tanggal" id="from" value="<?php echo $tanggal_berangkat ?>" placeholder="dd/mm/yyyy">
    <div class="clear pulang">Pulang</div>
    <input name="tanggal_pulang" type="text" class="tanggal pulang" id="to" value="<?php echo $tanggal_pulang ?>" placeholder="dd/mm/yyyy">
    <div class="clear"></div>
    <table>
        <tr style="text-align: center"><td>Dewasa</td><td>Anak <div style="font-size: 6pt;display: inline">2-12th</div></td><td>Bayi <div style="font-size: 6pt;display: inline"><2th</div></td></tr>
        <tr style="text-align: center">
            <td style="width: 28%">
                <select name="dewasa" class="span1">
                    <?php for ($i = 0; $i <= 4; $i++) {
                        echo "<option value='$i' " . (Yii::app()->getRequest()->getQuery('dewasa') == $i ? 'selected' : '') . ">$i</option>";
                    } ?>
                </select>
            </td>
            <td>
                <select name="anak" class="span1">
<?php for ($i = 0; $i <= 4; $i++) {
    echo "<option value='$i' " . (Yii::app()->getRequest()->getQuery('anak') == $i ? 'selected' : '') . ">$i</option>";
} ?>
                </select>
            </td>
            <td>
                <select name="bayi" class="span1">
<?php for ($i = 0; $i <= 4; $i++) {
    echo "<option value='$i' " . (Yii::app()->getRequest()->getQuery('bayi') == $i ? 'selected' : '') . ">$i</option>";
} ?>
                </select>
            </td>
        </tr>
    </table>
    <div class="controls">
        <input type="submit" value="Cari" style="text-align: right">
    </div>
</form>    