<?php
$ctr = 0;
if (is_array($friends)):
    foreach ($friends as $buddy):
	if($online[$ctr])
	{?>
	<img src="<?php echo base_url(); ?>assets/img/green-dot-icon.png" />
	<?php
	}
	else
	{?>
	<img src="<?php echo base_url(); ?>assets/img/grey-dot-icon.png" />
	<?php
	}
?>
        &nbsp;<b><a href="#" class="username" id="friend<?php echo $ctr; ?>"><?php echo $buddy ?></a></b>
        <?php if ($new_message[$ctr] > 0): ?>
            <img src="<?php echo base_url(); ?>assets/img/envelope.gif" />
        <?php endif; ?>
        <br />
    <?php
            ++$ctr;
        endforeach;
    endif;
    ?>
<script type="text/javascript">
    $(document).ready(function() {
<?php
    for ($count = 0; $count < $ctr; $count++) {
?>
            $('#friend' + <?php echo $count; ?>).click(function() {
                $('#users').hide();
                //start refreshing the chat window
                beginRefresh();
                $('#chat-area').show();
                $('#chatmessage').html('<img src="<?php echo base_url();?>assets/img/ajax-loader.gif" />');
                //add the dude who you're chatting with to session
                $.post(base+"chat/chatbuddy",{
                    username: $("#friend"+<?php echo $count; ?>).html()
                });

            });
<?php
    }
?>
    });
</script>