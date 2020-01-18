@extends('template')

@section('content')

	<SCRIPT>
		function redglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#A70700';
			elem.style.backgroundColor = '#A70700';
			elem.style.backgroundImage = '{{ asset('img/title/ssredbright.jpg') }}';
		}

		function unredglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#570700';
			elem.style.backgroundColor = '#570700';
			elem.style.backgroundImage = '{{ asset('img/title/shinystonered.jpg') }}';
		}

		function greyglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#878787';
			elem.style.backgroundColor = '#777777';
			elem.style.backgroundImage = '{{ asset('img/title/ssgreybright.png') }}';
		}

		function ungreyglow(id) {
			const elem = document.getElementById(id);
			elem.style.borderColor = '#373737';
			elem.style.backgroundColor = '#474747';
			elem.style.backgroundImage = '{{ asset('img/stoneback.gif') }}';
		}
	</SCRIPT>


	<TABLE
		style="PADDING-RIGHT: 15px; PADDING-LEFT: 15px; PADDING-BOTTOM: 0px; WIDTH: 100%; PADDING-TOP: 0px; min-width: 500px"
		cellSpacing=0 cellPadding=0 background=img/background.jpg>
		<TBODY>
		<TR>
			<TD>
				<CENTER>
					<TABLE cellSpacing=0 cellPadding=0 border=0>
						<TBODY>
						<TR>
							<TD>
								<CENTER><BR><SPAN
											style="DISPLAY: inline-block; MARGIN: 0px; WIDTH: 312px">
                  <TABLE style="DISPLAY: inline; WIDTH: 312px" cellSpacing=0
						 cellPadding=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=top height=180><IMG style="DISPLAY: block"
													 height=100 src="img/title/rslogo.gif" width=312> <BR>
                        <CENTER><SPAN style="" font-size: 14px"
                        color:white;\?>There are currently 77150 people
                        playing!</SPAN></CENTER>
							</TD>
						</TR>
						</TBODY>
					</TABLE>
					</SPAN><SPAN
						style="DISPLAY: inline-block; MARGIN: 0px 0px 0px 20px; WIDTH: 430px">
                  <TABLE style="DISPLAY: inline; WIDTH: 430px" cellSpacing=0
						 cellPadding=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=top>
                        <TABLE cellSpacing=0 cellPadding=0 bgColor=black
							   border=0>
                          <TBODY>
                          <TR>
                            <TD><IMG height=6 src="img/title/fm_topleft.gif"
									 width=6></TD>
                            <TD background=img/title/fm_top2.gif><IMG
									height=6 src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_topright.gif" width=6></TD></TR>
                          <TR>
                            <TD background=img/title/fm_left.gif><IMG
									height=1 src="img/title/blank.gif" width=6></TD>
                            <TD>
                              <CENTER><IMG height=7 src="img/title/blank.gif"
										   width=1><BR><B>Latest News and Updates</B><BR>
                              <TABLE cellSpacing=0 cellPadding=0
									 bgColor=black><TBODY>
                                <TR vAlign=top>
                                <TD align=middle width=100><A
										href="news.html"><IMG
											src="img/title/mm_scroll.jpg"
											border=0></A></TD>
                                <TD width=320>
                                <CENTER>
                                <TABLE height=130>
                                <TBODY>
                                <TR>
                                <TD>
                                <TABLE width=320>
                                <TBODY>
                                <TR>
                                <TD><A class=c
									   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=468">Rogue
                                Trader</A></TD>
                                <TD align=right>15-Aug-2005</TD></TR>
                                <TR>
                                <TD><A class=c
									   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=466">Tai
                                Bwo Wannai Clean-Up</A></TD>
                                <TD align=right>9-Aug-2005</TD></TR>
                                <TR>
                                <TD><A class=c
									   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=465">Behind
                                The Scenes - August</A></TD>
                                <TD align=right>8-Aug-2005</TD></TR>
                                <TR>
                                <TD><A class=c
									   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=464">New
                                York Servers Online</A></TD>
                                <TD align=right>5-Aug-2005</TD></TR>
                                <TR>
                                <TD><A class=c
									   href="http://news-web.runescape.com/aff/runescape/newsitem.cgi?id=462">48
                                more bank slots for members</A></TD>
                                <TD
									align=right>1-Aug-2005</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></CENTER></TD>
                                <TR></TR></TBODY></TABLE>To view a full list of
                              news and updates, <A class=c
												   href="news.html">Click
                              Here</A>. <BR><BR></CENTER></TD>
                            <TD background=img/title/fm_right.gif><IMG
									height=1 src="img/title/blank.gif"
									width=6></TD></TR>
                          <TR>
                            <TD><IMG height=6
									 src="img/title/fm_bottomleft.gif" width=6></TD>
                            <TD background=img/title/fm_bottom2.gif><IMG
									height=6 src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_bottomright.gif"
									 width=6></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></SPAN>
					<DIV
						style="; WIDTH: expression(document.body.clientWidth > 770 ? '770px': 'auto' ); max-width: 770px">
						<TABLE style="MARGIN-TOP: 10px; max-width: 770px"
							   cellSpacing=0 cellPadding=0 bgColor=black border=0>
							<TBODY>
							<TR>
								<TD><IMG height=6 src="img/title/fm_topleft.gif"
										 width=6></TD>
								<TD background=img/title/fm_top2.gif><IMG height=6
																		  src="img/title/blank.gif" width=1></TD>
								<TD><IMG height=6 src="img/title/fm_topright.gif"
										 width=6></TD>
							</TR>
							<TR>
								<TD background=img/title/fm_left.gif><IMG height=1
																		  src="img/title/blank.gif" width=6></TD>
								<TD>
									<CENTER><IMG height=7 src="img/title/blank.gif"
												 width=505><BR><B>Main Features</B> <BR><BR><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="detail.html"><IMG
										src="img/title/mm_sword.jpg" border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110>
                                <TBODY>
                                <TR>
                                <TD class=b2 id=playgamebut
									background=img/title/shinystonered.jpg
									bgColor=#570700>
                                <CENTER><A class=whitelink
										   onmouseover="redglow('playgamebut')"
										   onmouseout="unredglow('playgamebut')"
										   href="detail.html"><B>Play
                                Game</B><BR>(Existing&nbsp;User)</A></CENTER></TD></TR></TBODY></TABLE>Play
                              RuneScape right now!<BR><A class=c
														 href="detail.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="create/index.html"><IMG
										src="img/title/mm_player.jpg" border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b2 id=createaccountbut
									background=img/title/shinystonered.jpg
									bgColor=#570700>
                                <CENTER><A class=whitelink
										   onmouseover="redglow('createaccountbut')"
										   onmouseout="unredglow('createaccountbut')"
										   href="create/index.html"><B>Create&nbsp;Account</B><BR>(New
                                User)</A></CENTER></TD></TR></TBODY></TABLE>Create
                              a free account for both the game &amp;
                              website.<BR><A class=c
											 href="create/index.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="screenshots/screenshots.html"><IMG
										src="img/title/mm2_screenshots.jpg"
										border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=screenshotsbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('screenshotsbut')"
										   onmouseout="ungreyglow('screenshotsbut')"
										   href="screenshots/screenshots.html"><B>Screenshots</B></A></CENTER></TD></TR></TBODY></TABLE>Lots
                              of images of the game in action.<BR><A class=c
																	 href="screenshots/screenshots.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="members/members.html"><IMG
										src="img/title/mm_members.jpg" border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=membersbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('membersbut')"
										   onmouseout="ungreyglow('membersbut')"
										   href="members/members.html"><B>Benefits
                                for
                              Members</B></A></CENTER></TD></TR></TBODY></TABLE>Find
                              out what extras are available to members.<BR><A
										class=c
										href="members/members.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="howtoplay.html"><IMG
										height=120 src="img/title/mm_howtoplay.jpg"
										width=77 border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=manualbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('manualbut')"
										   onmouseout="ungreyglow('manualbut')"
										   href="howtoplay.html"><B>Manual</B></A></CENTER></TD></TR></TBODY></TABLE>Detailed
                              info on all aspects of the game.<BR><A class=c
																	 href="howtoplay.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="hiscores/hiscores.html"><IMG
										src="img/title/mm_chalice.jpg" border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=hiscoresbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('hiscoresbut')"
										   onmouseout="ungreyglow('hiscoresbut')"
										   href="hiscores/hiscores.html"><B>Full<BR>Hiscores</B></A></CENTER></TD></TR></TBODY></TABLE>Is
                              your character in the top 500,000?<BR><A class=c
																	   href="hiscores/hiscores.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="varrock/varrockindex.html"><IMG
										height=120 src="img/title/mm_lov.jpg" width=77
										border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=varrockbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('varrockbut')"
										   onmouseout="ungreyglow('varrockbut')"
										   href="varrock/varrockindex.html"><B>Library
                                of
                              Varrock</B></A></CENTER></TD></TR></TBODY></TABLE>Stories
                              and letters about RuneScape.<BR><A class=c
																 href="varrock/varrockindex.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD align=middle width=100><A
									href="worldmap/worldmap.html"><IMG
										height=120 src="img/title/mm_worldmap.jpg"
										width=77 border=0></A></TD>
                            <TD vAlign=top width=120>
                              <TABLE height=45 cellPadding=2 width=110
									 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b id=worldmapbut
									background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   onmouseover="greyglow('worldmapbut')"
										   onmouseout="ungreyglow('worldmapbut')"
										   href="worldmap.html"><B>World
                                Map</B></A></CENTER></TD></TR></TBODY></TABLE>Great
                              for finding your way around.<BR><A class=c
																 href="worldmap/worldmap.html">Click
                              Here</A> </TD></TR></TBODY></TABLE></SPAN><SPAN
															class=item>
                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD width=100><IMG height=1
											   src="img/title/blank.gif" width=77></TD>
                            <TD width=120><IMG height=1
											   src="img/title/blank.gif"
											   width=110></TD></TR></TBODY></TABLE></SPAN></CENTER>
									<BR></TD>
								<TD background=img/title/fm_right.gif><IMG height=1
																		   src="img/title/blank.gif" width=6></TD>
							</TR>
							<TR>
								<TD><IMG height=6 src="img/title/fm_bottomleft.gif"
										 width=6></TD>
								<TD background=img/title/fm_bottom2.gif><IMG height=6
																			 src="img/title/blank.gif" width=1>
								</TD>
								<TD><IMG height=6 src="img/title/fm_bottomright.gif"
										 width=6></TD>
							</TR>
							</TBODY>
						</TABLE>
					</DIV>
					<SPAN
						style="DISPLAY: inline-block; MARGIN: 0px 7px 10px 0px; WIDTH: 380px">
                  <TABLE style="DISPLAY: inline; WIDTH: 380px" cellSpacing=0
						 cellPadding=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=top><BR>
                        <TABLE cellSpacing=0 cellPadding=0 width=380
							   bgColor=black>
                          <TBODY>
                          <TR>
                            <TD><IMG height=6 src="img/title/fm_topleft.gif"
									 width=6></TD>
                            <TD background=img/title/fm_top2.gif><IMG
									height=6 src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_topright.gif" width=6></TD></TR>
                          <TR>
                            <TD background=img/title/fm_left.gif><IMG
									height=1 src="img/title/blank.gif" width=6></TD>
                            <TD width=368><IMG height=7
											   src="img/title/blank.gif" width=1><BR>
                              <CENTER><B>Secure Services</B> <BR><BR>
                              <TABLE cellSpacing=5 cellPadding=0>
                                <TBODY>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Subscribe</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_subscribe.jpg"
											width=48 border=0></A></TD>
                                <TD vAlign=top>Start a members subscription
                                here.<BR><A class=c
											href="login.html">Login</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Account
                                Management</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_accman.jpg"
											width=48 border=0></A></TD>
                                <TD>Manage your Password and Recovery
                                Details.<BR><A class=c
											   href="login.html">Login</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Customer
                                Support</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_support.jpg"
											width=48 border=0></A></TD>
                                <TD>Questions?<BR>Contact our staff.<BR><A
												class=c
												href="login.html">Login</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Message
                                Centre</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_inbox.jpg"
											width=48 border=0></A></TD>
                                <TD>Your messages from our staff.<BR><A class=c
																		href="login.html">Login</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Forums</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_forums.jpg"
											width=48 border=0></A></TD>
                                <TD>Discuss the game with fellow players!<BR><A
											class=c
											href="login.html">Login</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Personal
                                Hiscores</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_chalice.jpg"
											width=48 border=0></A></TD>
                                <TD>How do you rank compared to your
                                friends?<BR><A class=c
											   href="login.html">Login</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="login.html"><B>Latest
                                Poll</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="login.html"><IMG
											height=75 src="img/title/mms_vote.jpg"
											width=48 border=0></A></TD>
                                <TD>What do you enjoy most about Quests? <BR><A
											class=c
											href="login.html">Login</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD>&nbsp;</TD></TR></TBODY></TABLE></CENTER></TD>
                            <TD background=img/title/fm_right.gif><IMG
									height=1 src="img/title/blank.gif"
									width=6></TD></TR>
                          <TR>
                            <TD><IMG height=6
									 src="img/title/fm_bottomleft.gif" width=6></TD>
                            <TD background=img/title/fm_bottom2.gif><IMG
									height=6 src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_bottomright.gif"
									 width=6></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></SPAN><SPAN
						style="DISPLAY: inline-block; MARGIN: 0px 0px 10px; WIDTH: 380px">
                  <TABLE style="DISPLAY: inline; WIDTH: 380px" cellSpacing=0
						 cellPadding=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=top><BR>
                        <TABLE cellSpacing=0 cellPadding=0 width=380
							   bgColor=black>
                          <TBODY>
                          <TR>
                            <TD><IMG height=6 src="img/title/fm_topleft.gif"
									 width=6></TD>
                            <TD width="100%"
								background=img/title/fm_top2.gif><IMG height=6
																	  src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_topright.gif" width=6></TD></TR>
                          <TR>
                            <TD background=img/title/fm_left.gif><IMG
									height=1 src="img/title/blank.gif" width=6></TD>
                            <TD width=368>
                              <CENTER><IMG height=7 src="img/title/lank.gif"
										   width=1><BR><B>Other Features</B> <BR><BR><!--table to contain options-->
                              <TABLE cellSpacing=5 cellPadding=0>
                                <TBODY>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html"><B>Unsubscribe</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html"><IMG
											height=75 src="img/title/mms_unsubscribe.jpg"
											width=48 border=0></A></TD>
                                <TD>Cancel your subscription.<BR><A class=c
																	href="https://masterb-web.runescape.com/aff/runescape/unsubscribe.html">Click
                                Here</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="https://password-web.runescape.com/aff/runescape/index.html"><B>Password
                                Support</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="https://password-web.runescape.com/aff/runescape/index.html"><IMG
											height=75
											src="img/title/mms_passwordsupport.jpg"
											width=48 border=0></A></TD>
                                <TD>If you lose/forget your password help is at
                                hand.<BR><A class=c
											href="https://password-web.runescape.com/aff/runescape/index.html">Click
                                Here</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="faq/faqindex.html"><B>F.A.Q.</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="faq/faqindex.html"><IMG
											height=75 src="img/title/mms_faq.jpg" width=48
											border=0></A></TD>
                                <TD>Answers to Frequently Asked Questions.<BR><A
											class=c
											href="faq/faqindex.html">Click
                                Here</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="guides/guides.html"><B>Rules
                                &amp;
                                Security</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="guides/guides.html"><IMG
											height=75 src="img/title/mms_rules.jpg"
											width=48 border=0></A></TD>
                                <TD>Learn our rules and stay safe online.<BR><A
											class=c
											href="guides/guides.html">Click
                                Here</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="files/files.html"><B>Extra
                                Files</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="files/files.html"><IMG
											height=75 src="img/title/mms_extrafiles.jpg"
											width=48 border=0></A></TD>
                                <TD>Download optional extras for
                                RuneScape.<BR><A class=c
												 href="files/files.html">Click
                                Here</A></TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD class=b background=img/stoneback.gif
									bgColor=#474747>
                                <CENTER><A class=whitelink
										   href="#"><B>RS-Classic</B></A></CENTER></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><A
										href="#"><IMG
											height=75 src="img/title/mms_rsclassic.jpg"
											width=48 border=0></A></TD>
                                <TD>RuneScape Classic.<BR><A class=c
															 href="#">Click
                                Here</A></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                <TD vAlign=top align=middle width=160>
                                <TABLE
									style="BORDER-RIGHT: black 4px solid; BORDER-TOP: black 4px solid; BORDER-LEFT: black 4px solid; BORDER-BOTTOM: black 4px solid"
									cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD><B>&nbsp;</B></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><IMG height=75 src="img/title/blank.gif"
										 width=48 border=0></TD>
                                <TD style="COLOR: black">What do you enjoy most
                                about Quests?
                                <BR>&nbsp;</TD></TR></TBODY></TABLE></TD>
                                <TD>&nbsp;</TD>
                                <TD vAlign=top align=middle width=160>
                                <TABLE
									style="BORDER-RIGHT: black 4px solid; BORDER-TOP: black 4px solid; BORDER-LEFT: black 4px solid; BORDER-BOTTOM: black 4px solid"
									cellPadding=2 width=160 bgColor=black>
                                <TBODY>
                                <TR>
                                <TD><B>&nbsp;</B></TD></TR></TBODY></TABLE>
                                <TABLE>
                                <TBODY>
                                <TR>
                                <TD><IMG height=75 src="img/title/blank.gif"
										 width=48
										 border=0></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></CENTER></TD>
                            <TD background=img/title/fm_right.gif><IMG
									height=1 src="img/title/blank.gif"
									width=6></TD></TR>
                          <TR>
                            <TD><IMG height=6
									 src="img/title/fm_bottomleft.gif" width=6></TD>
                            <TD background=img/title/fm_bottom2.gif><IMG
									height=6 src="img/title/blank.gif" width=1></TD>
                            <TD><IMG height=6
									 src="img/title/fm_bottomright.gif"
									 width=6></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></SPAN><BR>
						<TABLE>
							<TBODY>
							<TR>
								<TD>
									<DIV
										style="FONT-SIZE: 11px; FONT-FAMILY: Arial,Helvetica,sans-serif"
										align=center>This webpage and its contents is copyright
										2005 Jagex Ltd<BR>To use our service you must agree to
											our <A class=c
												   href="terms/terms.html">Terms+Conditions</A>
											+ <A class=c
												 href="privacy/privacy.html">Privacy
												policy</A>
									</DIV>
								</TD>
							</TR>
							</TBODY>
						</TABLE></CENTER>
			</TD>
		</TR>
		</TBODY>
	</TABLE>

	<!-- Left column -->
	<div class="col side-left text-info border-secondary border-right">
		<h4 class="pl-3 pr-3">Latest Achievements</h4>
		<div class="text-primary ml-3 mr-3" style="font-size: 13px;">
			@foreach ($activityfeed as $activity)
				<div class="row clickable-row" data-href="../player/{{ $activity->id }}">
					<div class="col-sm text-info font-weight-bold">
									<span
										class="small">{{ Carbon\Carbon::parse($activity->time)->diffForHumans() }}</span>
					</div>
					<div class="col-9 pr-1 pl-1">
						@if($activity->group_id != 10)
							<img class="mb-1" src="./img/{{ $activity->group_id }}.svg" width="15"
								 height="15">
						@endif
						<img class="pr-2 float-left" src="./img/avatars/{{ $activity->id }}.png"
							 width="36" height="48">
						<span class="font-weight-bold">{{ ucfirst($activity->username) }}</span>
						{!! $activity->message !!}
					</div>
					<div class="border-top border-info mt-3"></div>
				</div>
			@endforeach
		</div>


		<!-- Center column with title text -->
		<div class="col container text-center">
			<div class="d-block pt-4">
				<img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="logo">
			</div>

			<div class="d-block pb-3">
				<div class="text-white-50">Striving for a replica RSC game and more</div>
			</div>

			<div class="d-block pt-1 pb-4">
				<div class="btn btn-md btn-secondary dropdown-toggle" data-toggle="dropdown"
					 aria-haspopup="true"
					 aria-expanded="false">
					Play Now
				</div>
				<div class="dropdown-menu bg-dark" style="padding: 0;">
					@if ($agent->isAndroid())
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{{ asset('downloads/openrsc.apk') }}">Android
							Version</a>
					@elseif ($agent->isWindows())
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{{ asset('OpenRSC.exe') }}">Windows Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{{ asset('downloads/OpenRSC.jar') }}">Alternative
							Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
							Player Edition</a>
					@else
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{{ asset('downloads/OpenRSC.jar') }}">Game
							Launcher</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="{{ asset('downloads/openrsc.apk') }}">Android
							Version</a>
						<a class="dropdown-item text-white-50 bg-dark"
						   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
							Player</a>
					@endif
				</div>
			</div>

			<div class="middle container-fluid border-top border-info">
				<div class="text-left text-primary">
					<br>
					<h4 class="text-info">Statistics</h4>
					<div>
						Players Online:
						<a href="{{ route('online') }}">
                    <span class="text-info float-right">
                        {{ $online }}
                    </span>
						</a>
					</div>
					<div>
						Server Status:
						<span class="float-right">
                    {!! $status !!}
                </span>
					</div>
					<div>
						Players Created Today:
						<a href="{{ route('createdtoday') }}">
                        <span class="text-info float-right">
                            {{ $registrations }}
                        </span>
						</a>
					</div>
					<div>
						Online Last 48 Hours:
						<a href="{{ route('logins48') }}">
                        <span class="text-info float-right">
                            {{ $logins }}
                        </span>
						</a>
					</div>
					<div>
						Unique Players:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $uniquePlayers }}
                        </span>
						</a>
					</div>
					<div>
						Total Players:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $totalPlayers }}
                        </span>
						</a>
					</div>
					<div>
						Sum Gold:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
							{{ number_format($sumgold) }}
							<img class="mt-n2 ml-n2" src="{{ asset('img/items/10.png') }}"
								 alt="coins" height="24px" width="32px"/>
                        </span>
						</a>
					</div>
					<div>
						Cumulative Play:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $totalTime }}
                        </span>
						</a>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>

@endsection
