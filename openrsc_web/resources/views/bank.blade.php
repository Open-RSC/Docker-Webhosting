@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Shar's Bank</h2>

			<div class="sm-stats pl-3 pr-3">
				<div class="pb-0 stats row justify-content-center text-primary">
                    <?php $file = 'https://game.openrsc.com/img/avatars/' . $character['id'] . '.png'; ?>
					<img class="pl-5" src="<?php echo $file; ?>" style="height: 125px;">
					<div class="pl-5 col-6">
					<span class="sm-stats text-info pt-3">Status:
						<?php if ($character['online'] == 1) {
                            echo '<span class="green"><strong>Online</strong></span>';
                        } else {
                            echo '<span class="red"><strong>Offline</strong></span>';
                        } ?>
					</span>
						<span class="sm-stats text-info">Last Online:
						<time class="timeago text-primary"
							  datetime="<?php echo strftime("%Y-%m-%dT%H:%M:%S", $character["login_date"]) ?>"></time>
					</span>
						<span class="sm-stats pt-2">Shar accepts player item donations for drop parties.</span>
						<span class="sm-stats pt-2">To donate in-game items to Shar, contact a staff member.</span>
					</div>
				</div>

				<!-- Regular view only -->
				<div class="stats pl-5 pr-5 d-none d-md-block d-lg-block" align="center">
					<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
                        <?php $bank = $connector->num_rows($player_bank_regular); ?>
						<tr>
                            <?php
                            if ($bank > 0) {
                            for ($i = 1; $list = $connector->fetchArray($player_bank_regular); $i++) {
                            ?>
							<td style="border: 1px solid black;">
								<div class="clickable-row item<?php echo $list['id'] ?>"
									 data-href="../itemdef/<?php echo $list['id'] ?>"
									 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    <?php echo $list["number"]; ?>
								</div>
							</td>
                        <?php
                        if (($i % 10 == 0) && ($i < $bank)) {
                            echo '</tr>';
                        }
                        }
                        } else {
                            echo "No bank items found.";
                        } ?>
					</table>
				</div>

				<!-- Mobile view only -->
				<div class="stats pl-5 pr-5 d-md-none" align="center">
					<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
                        <?php $bank = $connector->num_rows($player_bank_mobile); ?>
						<tr>
                            <?php
                            if ($bank > 0) {
                            for ($i = 1; $list = $connector->fetchArray($player_bank_mobile); $i++) {
                            ?>
							<td style="border: 1px solid black;">
								<div class="clickable-row item<?php echo $list['id'] ?>"
									 data-href="../itemdef/<?php echo $list['id'] ?>"
									 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    <?php echo $list["number"]; ?>
								</div>
							</td>
                        <?php
                        if (($i % 5 == 0) && ($i < $bank)) {
                            echo '</tr>';
                        }
                        }
                        } else {
                            echo "No bank items found.";
                        } ?>
					</table>
				</div>

			</div>

		</div>
	</div>
@endsection
