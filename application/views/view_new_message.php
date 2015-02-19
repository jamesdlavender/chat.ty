<?php
if($ctr > 1) $messages = $ctr.' New messages';
else $messages = $ctr.' New message';
?>
<script type="text/javascript">
$(document).ready(function() {
    $("#newmessage").html('<img src="<?php echo base_url();?>assets/img/spacer.gif" width="5" height="17" /><span class="label label-warning btn-large"><img src="<?php echo base_url();?>assets/img/envelope.gif" /><?=$messages;?></span>');
});
</script>