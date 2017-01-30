<h2><?php echo $title ?></h2>

<a href="<?php echo $fileName; ?>">CSV Download</a>

<h3 id="kumuliert">Kumuliert</h3>

<div class="row">
    <div class="col-lg-6">
        <h4>Einnahmen</h4>
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>Buchungstext</th>
                    <th class="text-right text-nowrap">Betrag</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            foreach ($stats as $key => $value) {
                if ($value < 0.0) {
                    continue;
                }
                $sum += $value;
                ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td class="text-right"><?php echo number_format($value, 2, ',', '.') . ' €'; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot class="thead-inverse">
                <tr>
                    <th>Summe</th>
                    <th class="text-right text-nowrap"><?php echo number_format($sum, 2, ',', '.') . ' €' ?></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="col-lg-6">
        <h4>Ausgaben</h4>
        <table class="table table-striped">
            <thead class="thead-inverse">
            <tr>
                <th>Buchungstext</th>
                <th class="text-right text-nowrap">Betrag</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            foreach ($stats as $key => $value) {
                if ($value > 0.0) {
                    continue;
                }
                $sum += $value;
                ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td class="text-right"><?php echo number_format($value, 2, ',', '.') . ' €'; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot class="thead-inverse">
            <tr>
                <th>Summe</th>
                <th class="text-right text-nowrap"><?php echo number_format($sum, 2, ',', '.') . ' €' ?></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<h3 id="buchungszeilen">Buchungszeilen</h3>

<div class="row">
    <div class="col-lg-6">
        <h4>Einnahmen</h4>
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>Datum</th>
                    <th>Buchungstext</th>
                    <th class="text-right text-nowrap">Betrag</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            foreach ($data as $line) {
                if ($line[1] < 0.0) {
                    continue;
                }
                if ($line[2] === 'EUR') {
                    $sum += $line[1];
                }
                ?>
                <tr>
                    <td><?php echo $line[0]; ?></td>
                    <td><?php echo $line[3]; ?></td>
                    <td class="text-right"><?php echo number_format($line[1], 2, ',', '.') . ($line[2] === 'EUR' ? ' €' : ''); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot class="thead-inverse">
                <tr>
                    <th>2015</th>
                    <th>Summe</th>
                    <th class="text-right text-nowrap"><?php echo number_format($sum, 2, ',', '.') . ' €' ?></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="col-lg-6">
        <h4>Ausgaben</h4>
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>Datum</th>
                    <th>Buchungstext</th>
                    <th class="text-right text-nowrap">Betrag</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            foreach ($data as $line) {
                if ($line[1] > 0.0) {
                    continue;
                }
                if ($line[2] === 'EUR') {
                    $sum += $line[1];
                }
                ?>
                <tr>
                    <td><?php echo $line[0]; ?></td>
                    <td><?php echo $line[3]; ?></td>
                    <td class="text-right text-nowrap"><?php echo number_format($line[1], 2, ',', '.') . ($line[2] === 'EUR' ? ' €' : ''); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot class="thead-inverse">
                <tr>
                    <th>2015</th>
                    <th>Summe</th>
                    <th class="text-right text-nowrap"><?php echo number_format($sum, 2, ',', '.') . ' €' ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
