@extends('template')

@section('content')
	<script>
		function dothemath() {
			let type;
			let levelraw;
			const attack = Math.floor(document.stats.attack.value);
			const defense = Math.floor(document.stats.defense.value);
			const strength = Math.floor(document.stats.strength.value);
			const hits = Math.floor(document.stats.hits.value);
			const ranged = Math.floor(document.stats.ranged.value);
			const magic = Math.floor(document.stats.magic.value);
			const prayer = Math.floor(document.stats.prayer.value);
			if (ranged * 1.5 > (attack + strength)) {
				levelraw = (ranged * 0.375 + (defense + hits) / 4) + ((magic + prayer) / 8);
				type = "Ranged";
			} else {
				levelraw = ((attack + strength + defense + hits) / 4) + ((magic + prayer) / 8);
				type = "Attack + Strength";
			}
			const level = Math.floor(levelraw);
			const decimal = levelraw - level;
			const help = 1 - decimal;
			const rangmiss = Math.ceil(help / .375);
			const major = Math.ceil(help / .25);
			const minor = Math.ceil(help / .125);
			let html = "Your combat level is <b>" + level + "</b>.<br> It is <b>" + type + "</b> based.<br><B>";
			if (type === "Ranged") {
				html = html + rangmiss + "</b> more ranged levels until level " + (level + 1) + "<br><B>" + major + "</b> more defense or hit levels until level " + (level + 1) + ".<br><b>" + minor + "</b> more magic or prayer levels until level " + (level + 1) + ".";
			} else {
				html = html + major + "</b> more attack, defense, strength, or hit levels until level " + (level + 1) + ".<br><b>" + minor + "</b> more magic or prayer levels until level " + (level + 1) + ".";
			}
			if (document.all)
				statsect.innerHTML = html;
			if (document.getElementById)
				document.getElementById("statsect").innerHTML = html
		}

		function Hit() {
			const Strength = (document.MaxHit.Strength.value);
			const WP = (document.MaxHit.WP.value);
			const Potion = (document.MaxHit.Potion.value);
			const Prayer = (document.MaxHit.Prayer.value);
			const Style = (document.MaxHit.Style.value);
			const Result = (((+Strength) * (+Potion)) + ((+Strength) * (+Prayer)) + (+Style)) * (((+WP) * 0.00175) + 0.1) + 1.05;

			let Result2 = Math.ceil(+Result);

			if (Result2 > Result) {
				Result2 = Result2 - 1;
			} else {
				Result2 = Result2;
			}
			document.MaxHit.Result.value = (+Result2);
			document.MaxHit.NR.value = (+Result)
		}
	</script>

	<div class="text-primary">
		<div class="pl-3 pr-3 container">

			<div class="table-transparent mt-2 pl-5 pt-3 pb-2 pr-5">
				<div class="h3">Combat Calculator</div>
				<div class="d-block">
					Ranged based - If (ranged * 1.5) &gt; (strength + attack) then your attack and strength are not
					counted
				</div>
				<div class="d-block">
					Combat based - If (ranged * 1.5) &lt; (strength + attack) then ranged is not counted.
				</div>
			</div>

			<div class="text-center pt-2">
				<table class="justify-content-center row">
					<tbody>
					<tr>
						<td>
							<form name="stats">
								<table class="mb-2" cellspacing="1" border="1"
									   style="width: 120px; padding: 1px; border: 1px;">
									<tbody>
									<tr>
										<td>
											<span class="small">Attack</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="attack" size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small">Defense</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   name="defense"
												   size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small">Strength</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="strength" size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small">Hits</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="hits" size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small">Ranged</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="ranged" size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small">Prayer</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="prayer" size="2">
										</td>
									</tr>
									<tr>
										<td>
											<span class="small"> Magic</span>
										</td>
										<td>
											<input class="text-center table-transparent text-primary border-0"
												   type="text"
												   name="magic" size="2">
										</td>
									</tr>
									</tbody>
								</table>
								<input class="btn-sm fa-text-width text-center btn-dark btn-outline-info outline-dark"
									   type="button" value="Calculate" onclick="dothemath()">
							</form>
						</td>
					</tr>
					</tbody>
				</table>
				<div class="d-block pt-1">
					<div id="statsect"></div>
				</div>
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="h3">Max Hit Calculator</div>
			</div>
		</div>


		<div class="container text-center pt-2">
			<form name="MaxHit" style="border: 0 solid; width:30%; height:20%">
				<table class="border-primary border"
					style="border-collapse: collapse" width="304"
					id="AutoNumber1">
					<tr>
						<td width="127" height="22">
							<div class="text-center">
								<strong>
									Strength:
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									<input type="text" name="Strength" size="4" value="0"
										   style="font-size: 8pt; font-weight: bold; border: 1px solid;">
								</strong>
							</div>
						</td>
					</tr>
					<tr>
						<td width="127" height="21">
							<div align="center">
								<strong>
									Weapon Power:
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									<input type="text" name="WP" size="4" value="0"
										   style="font-size: 8pt; font-weight: bold; border: 1px solid;">
								</strong>
							</div>
						</td>
					</tr>
					<tr>
						<td width="127" height="25">
							<div align="center">
								<strong>
									Potion?
								</strong>
							</div>
						</td>
						<td width="171">
							<p align="center">
								<strong>
									<select size="1" name="Potion"
											style="font-size: 8pt; font-weight: bold; border: 1px solid;">
										<option selected value="1">No Potion</option>
										<option value="1.14">Regular Strength Potion
										</option>
										<option value="1.205">Super Strength Potion</option>
									</select>
								</strong>
							</p>
						</td>
					</tr>
					<tr>
						<td width="127" height="25">
							<div align="center">
								<strong>
									Prayer?
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									<select size="1" name="Prayer"
											style="font-size: 8pt; font-weight: bold; border: 1px solid;">
										<option selected value="0">No Prayer</option>
										<option value="0.05">Burst Of Strength</option>
										<option value="0.1">Super Human Strength</option>
										<option value="0.15">Ultimate Strength</option>
									</select>
								</strong>
							</div>
						</td>
					</tr>
					<tr>
						<td width="127" height="25">
							<div align="center">
								<strong>
									Combat Style?
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									<select size="1" name="Style"
											style="font-size: 8pt; font-weight: bold; border: 1px solid;">
										<option value="1" selected>Controlled</option>
										<option value="3">Aggressive</option>
										<option value="0">Accurate</option>
										<option value="0">Defensive</option>
									</select>
								</strong>
							</div>
						</td>
					</tr>
					<tr>
						<td height="25" colspan="2">
							<p align="center">
								<strong>
									<input type="button" value="Calculate" name="B1"
										   onclick="Hit()"
										   style="font-size: 8pt; font-weight: bold; border: 1px solid;">
								</strong>
							</p>
						</td>
					</tr>
					<tr>
						<td width="127" height="16">
							<div align="center">
								<strong>
									Rounded Result
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									Unrounded Result
								</strong>
							</div>
						</td>
					</tr>
					<tr>
						<td width="127" height="26">
							<div align="center">
								<strong>
									<input type="text" name="Result" size="15"
										   style="font-size: 8pt; font-weight: bold; border: 1px solid;">
								</strong>
							</div>
						</td>
						<td width="171">
							<div align="center">
								<strong>
									<input type="text" name="NR" size="20"
										   style="font-size: 8pt; font-weight: bold; border: 1px solid;">
								</strong>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@endsection
