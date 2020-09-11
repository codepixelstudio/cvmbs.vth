<!-- panel.events -->
<div id="menu-panel-events" class="tabs-panel menu-panel">

    <!-- panel.header -->
    <header id="menu-panel-events-header" class="panel-header">

        college event calendar

    </header>
    <!-- END panel.header -->

    <?php $calendar_ID = get_current_blog_id(); ?>

	<!-- panel utility class -->
	<div class="panel-interior" id="calendar-panel" data-calendar-id="<?php echo $calendar_ID; ?>">

		<?php

			$defaultFeedURL = 'http://www.trumba.com/calendars/cvmbs.rss';
			$deptFeedURL = get_field( 'events_feed_RSS', 'option' );
			$feedURL = '';

			if ( empty( $deptFeedURL ) ) {

				$feedURL = $defaultFeedURL;

			} else {

				$feedURL = $deptFeedURL;

			}

			$content = @file_get_contents( $feedURL );

			if ( $content === FALSE ) {

			    // error handling
				echo '

					<div class="calendar-fail">

						<div class="container">

							<span>

								The calendar feed failed to load.<br />Please try again later.

							</span>

						</div>

					</div>

				';

			} else {

				$x = new SimpleXmlElement( $content );
				$limit = 16;
				$i = 1;

				echo '<ul class="events-list scroll-fix">';

				foreach( $x->channel->item as $entry ) {

					$title 		  = $entry->title;
					$date 		  = $entry->children('x-trumba', true)->formatteddatetime;
					$rawLocal 	  = $entry->children('xCal', true)->location;
					$start 		  = $entry->children('xCal', true)->dtstart;
					$link 		  = $entry->link;
					$rawDesc      = str_replace('&nbsp;', '', $entry->children('xCal', true)->description);

					$location 	  = strtok($rawLocal, '[0-9][1-9]');
					$monthID  	  = date('m', strtotime($start));
					$month 	  	  = date('F', strtotime($start));
					$day 	  	  = date('j', strtotime($start));

                    if ( $rawDesc ) {

                        $description  = '<span class="entry-description">' . $rawDesc . '</span>';

                    } else {

                        $description  = '';

                    }

					echo '<li class="event">

                        <div class="calendar-icon" aria-hidden="true">

                            <span class="calendar-month month-' . $monthID . '">' . $month . '</span>
                            <span class="calendar-day">' . $day . '</span>

                        </div>

                        <div class="entry-info">

                            <a class="event-link entry-title" href="' . $link . '">' . $title . '</a>

                            <span class="entry-date">' . $date . '</span>

                            ' . $description . '

                        </div>

					</li>';

					$i++;

					if ( $i >= $limit ) {

						break;

					}

				}

				echo "</ul>";

			}

		?>

	</div>
	<!-- END panel utility class -->

</div>
<!-- END panel.events -->
