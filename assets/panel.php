<?php
use Tracy\Helpers;
?>

<h1>Timber</h1>

<h2>Timber Info</h2>

<div class="tracy-inner tracy-InfoPanel">

    <table style="width: 100%;">

        <?php foreach ($info as $label => $val): ?>

            <tr>

                <?php if (is_array($val)): ?>

                    <td><?= Helpers::escapeHtml($label) ?></td>
                    <td style="font-weight: bold;"><?= Helpers::escapeHtml(implode(', ', $val)) ?></td>

                <?php elseif (iconv_strlen((string) $val, 'UTF-8') > 25): ?>

                    <td colspan="2"><?= Helpers::escapeHtml($label) ?> <b><?= Helpers::escapeHtml($val) ?></b></td>

                <?php else: ?>

                    <td><?= Helpers::escapeHtml($label) ?></td>
                    <td style="font-weight: bold;"><?= Helpers::escapeHtml($val) ?></td>

                <?php endif; ?>

            </tr>

        <?php endforeach; ?>

    </table>

</div>

<h2>Timber Context</h2>

<div class="tracy-inner tracy-DumpPanel">

    <?php echo $context; ?>

</div>
