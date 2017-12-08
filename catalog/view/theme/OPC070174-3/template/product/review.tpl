<?php if ($reviews) { ?>
<?php foreach ($reviews as $review) { ?>
<table class="table table-striped table-bordered">
  <tr>
    <td style="width: 100%;"><strong><?php echo $review['author']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p><?php echo $review['text']; ?></p>
      <?php for ($i = 1; $i <= 5; $i++) { ?>
      <?php if ($review['rating'] < $i) { ?>
      <span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
      <?php } else { ?>
      <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
      <?php } ?>
      <?php } ?></td>
  </tr>
</table>
<?php } ?>
<?php } else { ?>
<p><?php echo $text_no_reviews; ?></p>
<?php } ?>
