<?php defined("SYSPATH") or die("No direct script access.") ?>
<script type="text/javascript">
  $(document).ready(function() {
    $(".g-available .g-block").equal_heights();
    select_toolkit = function(el) {
      if (!$(this).hasClass("g-unavailable")) {
        window.location = <?= html::js_string(url::site("admin/graphics/choose/__TK__?csrf=$csrf")) ?>
          .replace("__TK__", $(this).attr("id"));
      }
    };
    $("#g-admin-graphics div.g-available .g-block").click(select_toolkit);
  });
</script>

<div id="g-admin-graphics">
  <h1> <?= t("Graphics Settings") ?> </h1>
  <p>
    <?= t("Gallery needs a graphics toolkit in order to manipulate your photos.  Please choose one from the list below.") ?>
  </p>

  <h2> <?= t("Active Toolkit") ?> </h2>
  <? if ($active == "none"): ?>
  <?= new View("admin_graphics_none.html") ?>
  <? else: ?>
  <?= new View("admin_graphics_$active.html", array("tk" => $tk->$active, "is_active" => true)) ?>
  <? endif ?>

  <div class="g-available">
    <h2> <?= t("Available Toolkits") ?> </h2>
    <? foreach (array_keys((array)$tk) as $id): ?>
    <? if ($id != $active): ?>
    <?= new View("admin_graphics_$id.html", array("tk" => $tk->$id, "is_active" => false)) ?>
    <? endif ?>
    <? endforeach ?>
  </div>
</div>

