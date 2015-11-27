<?php
    $acc_cat = $this->uri->segment(3);
    if ($acc_cat == 'caregiver') {
        $cat = 1;
    } else {
        $cat = 2;
    }

    $acc_type = $this->uri->segment(4);
    if ($acc_type == 'individual') {
        $type = 1;
    } else {
        $type = 2;
    }
?>

<div>
    <div class="form-field">
    <input type="hidden" name="account_category" value="<?php echo $cat;?>">
    <input type="hidden" name="account_type" value="<?php echo $type;?>">
    </div>
</div>